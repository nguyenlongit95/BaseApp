<?php

namespace App\Modules\Softcard\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;
use App\Modules\Softcard\Models\SoftcardItem;
use App\Modules\Softcard\Models\SoftcardOrder;
use App\Modules\Stockcard\Models\Stockcard;
use App\Modules\Wallet\Models\Wallet;
use App\Modules\Order\Models\Order;
use App\Modules\Transaction\Controllers\TransactionController;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use View;
use Cart;
use DB;
class SoftcardFrontController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPageSuccess()
    {

        $order = Order::where('user', Auth::user()->id)->where('type','MuaMaThe')->orderBy('id', 'DESC')->select('order_no')->first();
        if(! $order )
        {
            return 'Khong co giao dich gan day!';
        }
        $scOrders  = SoftcardOrder::where('order_no', $order->order_no)
                                   ->where('order_status','Paid')
                                   ->where('user', Auth::user()->id )
                                   ->where('payment_status', 'success')->get();
        $response = view('Softcard::response', compact('scOrders') )->render();
        return view('frontend.pages.softcardsuccess', compact('response') );
    }

    public function getOrderSoftcard(Request $request)
    {
        if( Auth::check() )
        {
            $total = Cart::total();
            $wallet = Wallet::where('user', Auth::user()->id )->first();
            // Balance
            $balance = number_format($wallet->balance_decode);
            $actionUrl = route('softcard.postcheckout');
            return view('frontend.pages.muamathecheckout', compact('total', 'balance', 'wallet', 'actionUrl') );
        }else{
            return redirect()->route('login');
        }
    }

    public function postCheckoutSoftcard(Request $request)
    {
        DB::beginTransaction();
        try {
        //check stock card


        $order = new Order;
        $order->order_no = 'S'.time().mt_rand(10000,99999);
        $order->type = 'MuaMaThe';
        $order->user = Auth::user()->id;
        $order->userinfo = Auth::user()->name;
        $order->module_name = 'MuaMaThe';
        $order->tax_fee = 0;
        $order->amount = Cart::total(0,'','');
        $order->currency_code = 'VND';
        $order->paygate_code = 'WALLET';
        $order->affiliate_code = '';
        $order->order_status = 'pending';
        $order->payment_status = 'NONE';
        $order->shipment = 0;
        $order->shipinfo = '';
        $order->user_note = '';
        $order->admin_note = '';
        $order->save();

        foreach( json_decode( Cart::content() ) as $row )
        {
            if( Stockcard::countCardSku($row->id) < $row->qty )
            {
                DB::rollback();
                return 'San pham khong du hang! '.$row->name;
            }
            // Make SortcardOrder
            $scOrder = new SoftcardOrder;
            $scOrder->order_no =$order->order_no;
            $scOrder->user = Auth::user()->id;
            $scOrder->user_info = Auth::user()->username;
            $scOrder->product  = $row->name;
            $scOrder->product_sku  = $row->id;
            $scOrder->qty  = $row->qty;
            $scOrder->discount  = $row->options->discount;
            $scOrder->subtotal  = $row->subtotal;
            $scOrder->order_status  = 'pending';
            $scOrder->payment_status  = 'none';
            $scOrder->cart_content  = Cart::content();
            $scOrder->save();
        }


        // Destroy Cart
        Cart::destroy();

        // Run transaction
        $usedWallet = Wallet::getUserWallet(Auth::user()->id);
        $trans_id = TransactionController::makeTransaction($order, ['from_wallet'=>$usedWallet, 'to_wallet'=>Wallet::getWalletAdmin(),'module'=>'CheckoutSoftcard','description'=>$order->order_no]);
        $runTransaction = TransactionController::runTransaction($trans_id);
        if( $runTransaction == 2 )
        {
            $order->order_status = 'Paid';
            $order->payment_status = 'success';
            $order->update();
            SoftcardOrder::where('order_no',$order->order_no)->update(['transaction_id'=>$trans_id,'order_status'=>'Paid','payment_status'=>'success']);

            //Make stockcard for order
            $orderSuccess = SoftcardOrder::where('order_no',$order->order_no)->where('order_status','Paid')->where('payment_status','success')->get();
            foreach($orderSuccess as $order )
            {
                $stocks = Stockcard::where('status',0)->where('item_sku', $order->product_sku)->limit($order->qty)->get();
                foreach ($stocks as $stock)
                {
                    $stock->status = 1;
                    $stock->sold_user = Auth::user()->id;
                    $stock->sold_date = now();
                    $stock->order_no  = $order->order_no;
                    $stock->save();
                }
            }

            DB::commit();
            return redirect()->route('frontend.softcard.success');

        }else{
            $order->order_status = 'pending';
            $order->payment_status = 'none';
            $order->update();
            SoftcardOrder::where('order_no',$order->order_no)->update(['transaction_id'=>$trans_id,'order_status'=>'pending','payment_status'=>'none']);
            DB::commit();
            return 'Thanh toan khong thanh cong!!!!';
        }
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('frontend.softcard.success')->withErrors(['message' => $e->getMessage()]);
        }
    }
}

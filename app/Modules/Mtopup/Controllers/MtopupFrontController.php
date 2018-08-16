<?php

namespace App\Modules\Mtopup\Controllers;

use App\Modules\Charging\Models\Charging;
use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontendController;
use Auth;
use DB;
use App\Modules\Mtopup\Models\Mtopup;
use App\Modules\Group\Models\Group;
use App\Modules\Mtopup\Models\MtopupTelco;
use App\Modules\Mtopup\Models\MtopupFees;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Modules\Mtopup\Helpers\MtopupHelper;
use App\Modules\Wallet\Models\Wallet;
use App\Modules\Order\Models\Order;
use App\Modules\Transaction\Controllers\TransactionController;

class MtopupFrontController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get Discount
     */
    public function getDiscountJson(Request $request)
    {
        $number_phone = $request->input('number_phone');
        $telco_type = $request->input('telco_type');
        $amount     = $request->input('amount');
        if( strlen($number_phone) > 2 )
        {
            $telco = MtopupTelco::where('number_format', 'like', '%,'.substr($number_phone,0,3).',%')->first();
            if( $telco )
            {
                $discount = MtopupFees::where('group', Auth::user()->group)->where('telco_key', $telco->key)->where('telco_type', $telco_type)->first();
                return '{"telco":"'.$telco->key.'","lsValue":"'.$telco->value.'","discount":'.$discount->discount.'}';
            }
            $telco = MtopupTelco::where('number_format', 'like', '%,'.substr($number_phone,0,4).',%')->first();
            if( $telco )
            {
                $discount = MtopupFees::where('group', Auth::user()->group)->where('telco_key', $telco->key)->where('telco_type', $telco_type)->first();
                return '{"telco":"'.$telco->key.'","lsValue":"'.$telco->value.'","discount":'.$discount->discount.'}';
            }
        }
        return '{"telco":"'.'","lsValue":"'.'","discount":'.'}';;
    }


    /*
     * Get view page Mtopup
     */
    public function getViewPageMTopupIndex()
    {
        return view('frontend.pages.napcham');
    }

    /*
     * Get View Page Checkout Success
     */
    public function getViewCheckoutSuccess()
    {
        return view('frontend.pages.success');
    }

    /*
     * postCheckoutMtopup
     */
    public function postCheckoutMtopup(Request $request)
    {
        $order = new Order;
        $order->order_no = 'M'.time().mt_rand(10000,99999);
        $order->type = 'Mtopup';
        $order->user = Auth::user()->id;
        $order->userinfo = Auth::user()->name;
        $order->module_name = 'MTopup';
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

        foreach( json_decode( Cart::content() ) as $row)
        {
            // Make Mtopup
            $mtopup = new Mtopup;
            $mtopup->order_id =$order->order_no;
            $mtopup->user = Auth::user()->id;
            $mtopup->user_info = Auth::user()->username;
            $mtopup->completed_value  = 0;
            $mtopup->currency_code  = $order->currency_code;
            $mtopup->status  = 'none';
            $mtopup->payment_status  = 'none';
            $mtopup->declared_value  = $row->options->amount;
            $mtopup->phone_number  = $row->options->phone_number;
            $mtopup->amount      = $row->options->amount;
            $mtopup->telco       = $row->options->telco;
            $mtopup->telco_type  = $row->options->telco_type;
            $mtopup->mix         = $row->options->mix;
            $mtopup->discount    = $this->getDiscount($row->options->telco, $row->options->telco_type);
            $mtopup->save();
        }
        // Destroy Cart
        Cart::destroy();

        // Run transaction
        $usedWallet = Wallet::getUserWallet(Auth::user()->id);
        $trans_id = TransactionController::makeTransaction($order, ['from_wallet'=>$usedWallet, 'to_wallet'=>Wallet::getWalletAdmin(),'module'=>'CheckoutMtopup','description'=>$order->order_no]);
        $runTransaction = TransactionController::runTransaction($trans_id);
        if( $runTransaction == 2 )
        {
            $order->order_status = 'Paid';
            $order->update();
            Mtopup::where('order_id',$order->order_no)->update(['transaction_id'=>$trans_id,'payment_status'=>'paid']);
            return redirect()->route('frontend.mtopup.success');
        }else{
            $order->order_status = 'pending';
            $order->update();
            Mtopup::where('order_id',$order->order_no)->update(['transaction_id'=>$trans_id,'payment_status'=>'none']);
            return 'Thanh toan khong thanh cong!!!!';
        }
    }

    /*
     * Get Discount
     */
    public function getDiscount($telco, $telco_type)
    {
        $discount = MtopupFees::where('group', Auth::user()->group)->where('telco_key', $telco)->where('telco_type', $telco_type)->first();
        return $discount->discount;
    }
    /*
     * Request Post Submit Mtopup
     * Make Cart Mtopup
     */
    public function postMtopup(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'amount'     => 'required',
            'telco_type' => 'required'
        ]);

        $input = $request->all();
        if( count($input['phone_number']) <= 0 )
        {
            return view('frontend.pages.napcham')->withErrors(['message' =>"Du lieu rong" ]);
        }

        if(  count($input['phone_number']) == count($input['amount']) AND count($input['amount']) == count($input['telco_type']) ) {

            for ($i = 0; $i < count($input['phone_number']); $i++) {
                $telco = MtopupHelper::getTelcoFromNumber($input['phone_number'][$i]);
                $discount = $this->getDiscount($telco, $input['telco_type'][$i] );
                $rows[$i]['id'] = MtopupHelper::getTelcoFromNumber($input['phone_number'][$i]).'_'.$input['amount'][$i];
                $rows[$i]['name'] = $input['phone_number'][$i];
                $rows[$i]['qty'] = 1;
                $rows[$i]['price'] = $input['amount'][$i] - ( $input['amount'][$i] * $discount )/100;
                $rows[$i]['options']['phone_number'] = $input['phone_number'][$i];
                $rows[$i]['options']['amount']      = $input['amount'][$i];
                $rows[$i]['options']['telco']      = $telco;
                $rows[$i]['options']['telco_type'] = $input['telco_type'][$i];
                $rows[$i]['options']['mix'] = (isset($input['mix'][$i])) ? 1 : 0;
            }
        }
        Cart::destroy();
        Cart::add($rows);

        return redirect()->route('frontend.mtopup.checkout', compact('actionUrl'));
    }

    // View page checkout Mtopup
    public function viewPageCheckout()
    {
        if( Auth::check() )
        {
            $total = Cart::total();
            $wallet = Wallet::where('user', Auth::user()->id )->first();

            // Balance
            $balance = number_format($wallet->balance_decode);
            $actionUrl = route('frontend.mtopup.checkout');
            return view('frontend.pages.checkout', compact('total', 'balance', 'wallet', 'actionUrl') );
        }else{
            return redirect()->route('login');
        }
    }


}

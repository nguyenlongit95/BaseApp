<?php
namespace App\Modules\Transaction\Controllers;

use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use DB;
use App\Modules\Transaction\Models\Transaction;
use App\Modules\Wallet\Models\Wallet;
use App\Modules\Paygate\Controllers\PaygateController;
class TransactionController extends BackendController
{
	public function index()
	{

	}

	public function transactionResponse()
	{
		return PaygateController::paygateResponse('OnepayND');
	}

	public static function makeTransaction($input, $option)
	{
		$trans = new Transaction;
		$trans->module  = ( isset($option['module']) ) ? $option['module'] : '';
		$trans->amount  = $input->amount;
		$trans->paygate = $input->paygate_code;
		$trans->fees = 0;
		$trans->total = $trans->amount + $trans->fees;
		$trans->transaction_code = 'T'.time().mt_rand(1000,9999);
		$trans->admin_note = ( isset($input->admin_note) ) ? $input->admin_note : '';
		$trans->currency_id = 1;
		$trans->currency_code = 'VND'; //phai kiem tra current code nguoi nhan nguoi gui trung nhau
        $trans->from_wallet  = $option['from_wallet'];
        $trans->to_wallet = $option['to_wallet'];
		$trans->checksum  = md5($trans->sender.time());
		$trans->status = 'Pending';
		$trans->creator = $input->user;
		$trans->creator_info = $input->userinfo;
		$trans->expired_at = null;
		$trans->description = $option['description'];
		$trans->ipaddress = null;
		$trans->save();
        return $trans->id;
	}

	public static function runTransaction($trans_id)
    {
        $trans = Transaction::findOrFail($trans_id);


        if( $trans->paygate == 'WALLET' )
        {
            DB::beginTransaction();
            try {
                $run = Wallet::transferFund($trans->id);
                if( $run )
                {
                    $trans->status = 'Paid';
                    $trans->update();
                    DB::commit();
                     // 2 is success
                }
            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors(['error' => $e->getMessage()]);
            }
            if($run)
            {
                return 2; // 2 is success
            }

        }else{
            DB::beginTransaction();
            try {
                $run =  PaygateController::runTransaction($trans->paygate, $trans->id);
                DB::commit();

            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors(['error' => $e->getMessage()]);
            }
            return $run;
        }
        return "Khong thuc hien transaction";

    }


	public static function resetTransaction($trans_id)
    {
        DB::beginTransaction();
        try {
            $trans = Transaction::findOrFail($trans_id);
            $input = new Transaction;
            $input->amount  = $trans->amount;
            $input->paygate_code = 'WALLET';
            $input->admin_note = '';
            $input->user = 1;
            $input->userinfo = 'admin';
            $trans_id = TransactionController::makeTransaction($input, ['from_wallet'=>$trans->to_wallet,'to_wallet'=>$trans->from_wallet,'module'=>'Reset'.$trans->module, 'description'=>'Reset Transaction:'.$trans->module]);
            $run = TransactionController::runTransaction($trans_id);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

        return $run;
    }



}

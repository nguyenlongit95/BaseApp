<?php

namespace App\Modules\Charging\Controllers;

use App\Modules\Charging\Models\ChargingFees;
use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use App\Modules\Transaction\Controllers\TransactionController;
use Auth;
use DB;
use App\User;
use App\Modules\Charging\Models\Charging;
use App\Modules\Charging\Models\ChargingsTelco;
use App\Modules\Group\Models\Group;
use App\Modules\Transaction\Models\Transaction;
use App\Modules\Wallet\Models\Wallet;
class ChargingController extends BackendController
{
    public function index(Request $request)
    {
        $title    = "Card Charging";
        $chargings = Charging::orderBy('id','DESC')->paginate(40);

        if($request->input('control') == 'search')
        {
            $user    = $request->input('user');
            $telco   = $request->input('telco');
            $amount  = $request->input('amount');
            $title  = "Search: ";

            $chargings = new Charging;
            if( $user != '' )
            {
                $chargings->where('user', $user);
            }
            $chargings->orderBy('id','DESC');
            $chargings->paginate(40);

            print_r($chargings);
            return exit();
            //$chargings = Charging::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(40);
        }
        return view("Charging::index", compact('title','chargings'));
    }

    /*---------------- HISTORY ---------------*/
    public function history(Request $request)
    {
        $title    = "Card Charging History";
        $chargings = Charging::orderBy('id','DESC')->paginate(40);
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $chargings = Charging::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(40);
        }
        return view("Charging::history", compact('title','chargings'));
    }

    /*---------------- RESET ACTIONS ---------------*/
    /*
     *  0: pending
        1: success
        2: sai menh gia
        3: khongdungduonc
        4: dasudung
     */
    public function resetCharging($id)
    {
        $card = Charging::findOrFail($id);
        if( $card->status == 0 )
        {
            return redirect()->route('chargings.history')
                ->with('success','Charging reseted!');
        }
        if( $card->status == 3 || $card->status == 4 )
        {
            $card->status         = 0;
            $card->update();
            return redirect()->route('chargings.index')
                ->with('success','Charging Reset successfully');
        }

        $trans_code = $card->transaction_code;
        if(!$trans_code)
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Mã giao dịch không tồn tại']);
        }

        DB::beginTransaction();
        try {
            $trans_id   = Transaction::where('transaction_code',$trans_code)->select('id')->first();
            $runTransaction = TransactionController::resetTransaction($trans_id->id);
            if( $runTransaction == 2 ) {
                $card->real_value = 0;
                $card->amount = $card->declared_value - ($card->declared_value * ChargingFees::getFees($card->telco)) / 100;
                $card->status = 0;
                $card->penalty = 0;
                $card->admin_note = '';
                $card->update();
                DB::commit();
            }
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        if( $runTransaction == 2 )
        {
            return redirect()->route('chargings.index')
                ->with('success','Charging Reset successfully');
        }else{
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Charging reset not completed']);
        }
    }

    /*----------------- SETTING -------------*/
    public function settings()
    {
        $setting = ''; //ChargingSetting::get();
        $groups = Group::orderBy('id','DESC')->get();
        $telcos = ChargingsTelco::orderBy('id','DESC')->get();
        $fees = new ChargingFees;
        return view("Charging::settings", compact('setting','groups','telcos', 'fees') );
    }


    public function createTelco()
    {
        return view("Charging::create-telco" );
    }

    public function editTelco($id)
    {
        $telco = ChargingsTelco::findOrFail($id);
        return view("Charging::edit-telco", compact('telco') );
    }

    public function postCreateTelco(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'key'     => 'required',
            'value' => 'required'
        ]);
        $mtopup = new ChargingsTelco;
        $mtopup->name = $request->input('name');
        $mtopup->key = $request->input('key');
        $mtopup->icon = $request->input('icon');
        $mtopup->description = $request->input('description');
        $mtopup->value = $request->input('value');
        if( $request->input('status') )
        {
            $mtopup->status = 1;
        }else{
            $mtopup->status = 0;
        }
        $mtopup->save();
        return redirect()->route('chargings.settings')
            ->with('success','Telco created successfully');
    }

    public function postUpdateTelco($id, Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'key'     => 'required',
            'value' => 'required'
        ]);
        $mtopup = ChargingsTelco::findOrFail($id);
        $mtopup->name = $request->input('name');
        $mtopup->key = $request->input('key');
        $mtopup->icon = $request->input('icon');
        $mtopup->description = $request->input('description');
        $mtopup->value = $request->input('value');
        if( $request->input('status') )
        {
            $mtopup->status = 1;
        }else{
            $mtopup->status = 0;
        }
        $mtopup->save();
        return redirect()->route('chargings.settings')
            ->with('success','Telco Updated successfully');
    }

    public function destroyTelco($id)
    {
        ChargingsTelco::find($id)->delete();
        return redirect()->route('chargings.settings')
            ->with('success','Telco deleted successfully');
    }

    public function updateFees(Request $request)
    {
        $val   = $request->input('val');
        $telco = $request->input('telco');
        $group = $request->input('group');
        $key   = $request->input('key');
        $fees = DB::table('chargings_fees')->where('telco_key',$telco)->where('group',$group)->first();
        if( $fees )
        {
            $input[$key] = ( $val > 0 ) ? $val : 0;
            $input['updated_at'] = now();
            DB::table('chargings_fees')->where('telco_key',$telco)->where('group',$group)->update($input);
            return response('Update Success', 200)
                ->header('Content-Type', 'text/plain');
        }else{
            $input['telco_key'] = $telco;
            $input['group'] = $group;
            $input[$key] = ( $val > 0 ) ? $val : 0;
            $input['created_at'] = now();
            $input['updated_at'] = now();
            DB::table('chargings_fees')->insert($input);
            return response('Create Success', 200)
                ->header('Content-Type', 'text/plain');
        }
        return response('Errors', 404)
            ->header('Content-Type', 'text/plain');
    }

    public static function insertCharge($row)
    {
        $charging = new \App\Modules\Charging\Models\Charging;
        $charging->user  = Auth::user()->id;
        $charging->user_info  = Auth::user()->username;
        $charging->type  = 'Charging';
        $charging->error_code = '';
        $charging->error_message = '';
        $charging->telco = $row['telco'];
        $charging->code = $row['code'];
        $charging->serial = $row['serial'];
        $charging->amount = $row['amount'] - ($row['amount']*ChargingFees::getFees($row['telco']))/100;
        $charging->declared_value = $row['amount'];
        $charging->checksum = md5( $charging->code. $charging->telco. $charging->serial );
        $charging->api_provider = 'WEB';
        $charging->request_id = '';
        $charging->description = '';
        $charging->admin_note = '';
        $charging->fees = ChargingFees::getFees($row['telco']);
        if( ! $charging->where('checksum', $charging->checksum)->first() )
        {
            $charging->save();
            return true;
        }else{
            return false;
        }
    }


    public static function insertChargebyUser($row, $user_id, $api_provider = NULL)
    {
        $charging = new \App\Modules\Charging\Models\Charging;
        $user = User::find($user_id);
        $charging->user  = $user_id;
        $charging->user_info  = $user->username;
        $charging->type  = 'Charging';
        $charging->error_code = '';
        $charging->error_message = '';
        $charging->telco = $row['telco'];
        $charging->code = $row['code'];
        $charging->serial = $row['serial'];
        $charging->amount = $row['value'] - ($row['value']*ChargingFees::getFeesUserId($row['telco'], $user_id))/100;
        $charging->declared_value = $row['value'];
        $charging->checksum = md5( $charging->code. $charging->telco. $charging->serial );
        $charging->api_provider = $api_provider;
        $charging->request_id = $row['request_id'];
        $charging->description = '';
        $charging->admin_note = '';
        $charging->fees = ChargingFees::getFeesUserId($row['telco'], $user_id);
        if( ! $charging->where('checksum', $charging->checksum)->first() )
        {
            $charging->save();
            $result = ['trans_id' => $charging->id, 'request_id'=> $charging->request_id, 'status' => 99, 'message' =>'Thẻ đang chờ xử lý'];
            return $result;

        }else{
            return false;
        }
    }






    /** ------------- AJAX ------------**/
    public function ajaxChargingMaster($id)
    {
        $card = Charging::findOrFail($id);
        $lsAmount = ChargingsTelco::where('key',$card->telco)->first();
        $lsAmount = explode(',',$lsAmount->value);
        return view("Charging::ajax.chargingmaster", compact('card','lsAmount'));
    }

    public function ajaxChargingActions(Request $request, $id)
    {
        /*
         *  0: pending
            1: success
            2: sai menh gia
            3: khongdungduoc
            4: dasudung
         */

        DB::beginTransaction();
        try {
            $action = $request->input('submit');
            switch ($action){
                case 'THEDUNG':
                    $run =  $this->setChargingTHEDUNG($request,$id);
                    DB::commit();
                    break;
                case 'XOATHE':
                    $run = $this->destroyCharging($id);
                    DB::commit();
                    break;
                case 'KHONGDUNGDUOC':
                    $run =  $this->setChargingKHONGDUNGDUOC($request, $id);
                    DB::commit();
                    break;
                case 'SAIMENHGIA':
                    $run =  $this->setChargingSAIMENHGIA($request, $id);
                    DB::commit();
                    break;
                case 'DASUDUNG':
                    $run = $this->setChargingDASUDUNG($request,$id);
                    DB::commit();
                    break;
                default:
                    return redirect()->route('chargings.index')
                        ->withErrors(['message'=>'Charging not completed']);
                    break;
            }
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return $run;
    }

    /*
     * THESAIMENHGIA
     */
    private function setChargingSAIMENHGIA($request, $id)
    {
        $card = Charging::findOrFail($id);
        $real = $request->input('real');
        if( $card->status != 0 )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Bạn phải reset thẻ để thiết lập lại!']);
        }

        if( $real <=0 )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Bạn chưa chọn mệnh giá thực!!']);
        }
        if( $real == $card->declared_value )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Mệnh giá mới phải khác mệnh giá khai báo!!']);
        }
        $amount = $real - ((ChargingFees::getFeesUserId($card->telco, $card->user)*$real)/100);
        $amount = $amount - ((ChargingFees::getPenalty($card->telco, $card->user)*$real)/100);
        // Run transaction
        $trans = new Transaction;
        $trans->amount  = $amount;
        $trans->paygate_code = 'WALLET';
        $trans->admin_note = '';
        $trans->user = 1;
        $trans->userinfo = 'admin';
        $usedWallet = Wallet::getUserWallet($card->user);
        $trans_id = TransactionController::makeTransaction($trans, ['from_wallet'=>Wallet::getWalletAdmin(),'to_wallet'=>$usedWallet,'module'=>'Charging', 'description'=>'THEDUNG:'.$request->input('admin_note')]);
        $runTransaction = TransactionController::runTransaction($trans_id);
        if( $runTransaction == 2 )
        {
            $card->real_value     = $request->input('real');
            $card->amount         = $amount;
            $card->status         = 2;
            $card->penalty        = ChargingFees::getPenalty($card->telco, $card->user);
            $card->admin_note     = $request->input('admin_note');

            $transaction_code = Transaction::where('id',$trans_id)->select('transaction_code')->first();
            $transaction_code = $transaction_code->transaction_code;
            $card->transaction_code = $transaction_code;
            $card->update();
            return redirect()->route('chargings.index')
                ->with('success','Charging Update successfully');
        }else{
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Charging Update not completed']);
        }
    }

    /*
     * Set Charging DaSuDung
     */
    private function setChargingKHONGDUNGDUOC($request,$id)
    {
        $card = Charging::findOrFail($id);
        if( $card->status != 0 )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Bạn phải reset thẻ để thiết lập lại!']);
        }
        $card->status         = 3;
        $card->admin_note     = $request->input('admin_note');
        $card->update();
        return redirect()->route('chargings.index')
            ->with('success','Charging Update successfully');
    }

    /*
     * Set Charging DaSuDung
     */
    private function setChargingDASUDUNG($request,$id)
    {
        $card = Charging::findOrFail($id);
        if( $card->status != 0 )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Bạn phải reset thẻ để thiết lập lại!']);
        }

        $card->status         = 4;
        $card->admin_note     = $request->input('admin_note');
        $card->update();
        return redirect()->route('chargings.index')
            ->with('success','Charging Update successfully');
    }
    /*
     * Set Charging RIGHT
     * - Update Wallet for user
     */
    private function setChargingTHEDUNG($request, $id)
    {

        $card = Charging::findOrFail($id);
        if( $card->status != 0 )
        {
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Bạn phải reset thẻ để thiết lập lại!']);
        }

        //Update wallet for user

        // Run transaction
        $trans = new Transaction;
        $trans->amount  = $card->amount;
        $trans->paygate_code = 'WALLET';
        $trans->admin_note = '';
        $trans->user = 1;
        $trans->userinfo = 'admin';
        $usedWallet = Wallet::getUserWallet($card->user);
        $trans_id = TransactionController::makeTransaction($trans, ['from_wallet'=>Wallet::getWalletAdmin(),'to_wallet'=>$usedWallet,'module'=>'Charging', 'description'=>'THEDUNG:'.$request->input('admin_note')]);
        $runTransaction = TransactionController::runTransaction($trans_id);
        if( $runTransaction == 2 )
        {
            $transaction_code = Transaction::where('id',$trans_id)->select('transaction_code')->first();
            $transaction_code = $transaction_code->transaction_code;
            $card->declared_value = $card->declared_value;
            $card->real_value     = $card->declared_value;
            $card->status         = 1;
            $card->admin_note     = $request->input('admin_note');
            $card->transaction_code = $transaction_code;
            $card->update();
            return redirect()->route('chargings.index')
                ->with('success','Charging Update successfully');
        }else{
            return redirect()->route('chargings.index')
                ->withErrors(['message'=>'Charging Update not completed']);
        }
    }

    /*
     * Destroy charging
     */
    public function destroyCharging($id)
    {
        $card = Charging::findOrFail($id);
        $card->delete();
        return redirect()->route('chargings.index')
            ->with('success','Charging deleted successfully');
    }

}

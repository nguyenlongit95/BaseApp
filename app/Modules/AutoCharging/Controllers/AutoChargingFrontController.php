<?php

namespace App\Modules\AutoCharging\Controllers;

use App\Modules\AutoCharging\Models\AutoChargingFees;
use App\Modules\AutoCharging\Models\AutoChargingSetting;
use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontendController;
use Auth;
use DB;
use App\Modules\AutoCharging\Models\AutoCharging;
use App\Modules\AutoCharging\Models\AutoChargingsTelco;
use App\Modules\Group\Models\Group;

class AutoChargingFrontController extends FrontendController
{
    function __construct()
    {
        parent::__construct();
    }

    function viewPageFrontCharging()
    {
        $lsTelco = AutoChargingsTelco::where('status', 1)->get();

        $lsAmount = $lsTelco->first()->value;
        $lsAmount = explode(',', $lsAmount);

        ///////Lịch sử tẩy thẻ
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $listHistory = Charging::where('user', $user_id)->orderBy('id','DESC')->get();
        }
        return view('frontend.pages.taythenhanh', compact('lsTelco', 'lsAmount', 'listHistory') );
    }

    public function renderContent()
    {
        $lsTelco = AutoChargingsTelco::where('status', 1)->get();
        $lsAmount = $lsTelco->first()->value;
        $lsAmount = explode(',', $lsAmount);
        return view('frontend.widgets.taythenhanh-content', compact('lsTelco', 'lsAmount') );
    }

    public function insertCharging(Request $request)
    {
        if( ! Auth::check() )
        {
            return redirect('/login');
        }
        $this->validate($request, [
            'telco' => 'required',
            'code' => 'required',
            'serial' => 'required',
            'amount' => 'required'
        ]);

        $input = $request->all();
        if( count($input['telco']) == count($input['code']) AND count($input['code']) == count($input['amount']) AND count($input['serial']) == count($input['amount']) )
        {
            for( $i=0; $i<count($input['telco']); $i++ )
            {
                $rows[$i]['telco'] = $input['telco'][$i];
                $rows[$i]['code'] = $input['code'][$i];
                $rows[$i]['serial'] = $input['serial'][$i];
                $rows[$i]['amount'] = $input['amount'][$i];
            }
            foreach( $rows as $row  )
            {
                if( ! \App\Modules\AutoCharging\Controllers\AutoChargingController::insertCharge($row) )
                {
                    return redirect()->route('frontend.pages.taythenhanh')->withErrors(['message' =>"Thẻ đã tồn tại :".$row['telco']."-".$row['code']."-".$row['serial'] ]);
                }
            }
        }
        return redirect()->route('frontend.pages.taythenhanh')->with('success','Đã thêm thẻ thành công');
    }



}

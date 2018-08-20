<?php

namespace App\Modules\Charging\Controllers;

use App\Modules\Charging\Models\ChargingFees;
use App\Modules\Charging\Models\ChargingSetting;
use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontendController;
use Auth;
use DB;
use App\Modules\Charging\Models\Charging;
use App\Modules\Charging\Models\ChargingsTelco;
use App\Modules\Group\Models\Group;

class ChargingFrontController extends FrontendController
{
    function __construct()
    {
        parent::__construct();
    }

    function viewPageFrontCharging()
    {
        $lsTelco = ChargingsTelco::where('status', 1)->get();

        $lsAmount = $lsTelco->first()->value;
        $lsAmount = explode(',', $lsAmount);

        ///////Lịch sử tẩy thẻ
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $listHistory = Charging::where('user', $user_id)->orderBy('id','DESC')->get();
        }
        return view('frontend.pages.taythecham', compact('lsTelco', 'lsAmount', 'listHistory') );
    }

    public function renderContent()
    {
        $lsTelco = ChargingsTelco::where('status', 1)->get();
        $lsAmount = $lsTelco->first()->value;
        $lsAmount = explode(',', $lsAmount);
        return view('frontend.widgets.taythecham-content', compact('lsTelco', 'lsAmount') );
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
                if( ! \App\Modules\Charging\Controllers\ChargingController::insertCharge($row) )
                {
                    return redirect()->route('frontend.pages.taythecham')->withErrors(['message' =>"Thẻ đã tồn tại :".$row['telco']."-".$row['code']."-".$row['serial'] ]);
                }
            }
        }
        return redirect()->route('frontend.pages.taythecham')->with('success','Đã thêm thẻ thành công');
    }



}

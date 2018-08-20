<?php

namespace App\Modules\AutoCharging\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use DB;
use App\Modules\AutoCharging\Models\AutoCard;

class AutoCardController extends BackendController
{

    public function index(Request $request)
    {
        $title = "Danh sách loại thẻ";
        $cards = Card::orderBy('id', 'DESC')->paginate(20);
        return view("Charging::card", compact('title', 'cards'));
    }


    /**
     *
     */
    public function createCard(Request $request){

        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            $this->validate($request, [
                'name' => 'required',
                'key' => 'required',
                'discount_manual' => 'min:0|max:255',
                'discount_api' => 'min:0|max:255',
                'discount_api' => 'required',
                'sort' => 'numeric'
            ]);

            $input = $request->all();

            ( isset($input['status']) ) ? $input['status'] = 1 : $input['status'] = 0;

            Card::create($input);
            return redirect()->route('cards.index')
                ->with('success','Card created successfully');

            return view('Charging::card',compact('title'));








        }else{
            echo 'Not Access';
            return ;
        }

        $card = array();
        $card['order_id'] = 'M'.time().mt_rand(10000,99999);
        $card['user'] = $user->id;
        $card['user_info'] = $user->username;
        $card['telco'] = 'viettel';
        $card['phone_number'] = $phone_number;
        $card['declared_value'] = $declared_value;
        $card['completed_value'] = 200000;
        $card['telco_type'] = $telco_type;
        $card['discount'] = 20;
        $card['amount'] = $topup['declared_value']*(1 - $topup['discount']/100);
        $topup['currency_code'] = 'VND';
        $topup['mix'] = 1;
        $topup['status'] = 'none';
        $topup['payment_status'] = 'none';
        $topup['created_at'] = date('Y-m-d H:i:s');
        $topup['updated_at'] = date('Y-m-d H:i:s');

        if (DB::table('chargings_orders')->insert($topup)) {
            echo 'Them thanh cong';

        } else {
            echo 'Khong thanh cong';
        }

    }



}

<?php

namespace App\Modules\Mtopup\Controllers;

use App\Modules\Charging\Models\Charging;
use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
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

class MtopupController extends BackendController
{

    public function mtopupAjaxActions(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $action =$request->input('submit');
            switch ( $action){
                case 'SAISO':
                    $run = $this->setMtopupSAISO($request, $id);
                    DB::commit();
                    break;
                case 'HUYVAHOANTIEN':
                    $run = $this->setMtopupHUYVAHOANTIEN($request, $id);
                    DB::commit();
                    break;
                case 'HUYVAXOA':
                    $run = $this->setMtopupHUYVAXOA($request, $id);
                    DB::commit();
                    break;
                case 'HOANTHANHDONHANG':
                    $run = $this->setMtopupHOANTHANHDONHANG($request, $id);
                    DB::commit();
                    break;
                case 'NAPTIEN':
                    $run = $this->setMtopupNAPTIEN($request, $id);
                    DB::commit();
                    break;
                default:
                    $run = '';
                    break;
            }
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('mtopup.index')->withErrors(['message' => $e->getMessage()]);
        }
        return $run;
    }

    public function setMtopupHUYVAHOANTIEN($request, $id)
    {
        $mtopup = Mtopup::findOrFail($id);
        if( $mtopup->status != 'none' )
        {
            return redirect()->route('mtopup.index')
                ->withErrors(['message'=>'Bạn phải reset lại đơn hàng mới được thiết lại lại!']);
        }
        if( $mtopup->payment_status == 'none' )
        {
            $mtopup->delete();
            return redirect()->route('mtopup.index')
                ->with('success','Đã xóa Đơn hàng thành công!');
        }
        elseif($mtopup->payment_status == 'paid'){

            DB::beginTransaction();
            try {
                $runTransaction = TransactionController::resetTransaction($mtopup->transaction_id);
                if( $runTransaction == 2 ) {
                    $mtopup->delete();
                    //Thực hiện việc hoàn tiền
                    DB::commit();
                }
            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

            if( $runTransaction == 2 )
            {
                return redirect()->route('mtopup.index')
                    ->with('success','Mtopup đã xóa và hoàn tiền thành công!');
            }else{
                return redirect()->route('mtopup.index')
                    ->withErrors(['message'=>'Hoàn tiền không thành công']);
            }
        }
    }

    public function  setMtopupHUYVAXOA($request, $id)
    {
        $mtopup = Mtopup::findOrFail($id);
        $mtopup->delete();
        return redirect()->route('mtopup.index')
            ->with('success','Đơn hàng đã xoá khỏi hệ thống!');
    }


    public function setMtopupHOANTHANHDONHANG($request, $id)
    {
        $mtopup = Mtopup::findOrFail($id);
        if( $mtopup->status != 'none' )
        {
            return redirect()->route('mtopup.index')
                ->withErrors(['message'=>'Bạn phải reset lại đơn hàng mới được thiết lại lại!']);
        }
        $mtopup->status = 'completed';
        $mtopup->admin_note = $request->input('admin_note');
        $mtopup->completed_value = $mtopup->declared_value;
        $mtopup->update();
        return redirect()->route('mtopup.index')
            ->with('success','Đơn hàng đã cập nhật thành công!');
    }

    public function  setMtopupSAISO($request, $id)
    {
        $mtopup = Mtopup::findOrFail($id);
        if( $mtopup->status != 'none' )
        {
            return redirect()->route('mtopup.index')
                ->withErrors(['message'=>'Bạn phải reset lại đơn hàng mới được thiết lại lại!']);
        }
        if( $mtopup->payment_status == 'none' )
        {
            $mtopup->status = 'wrong';
            $mtopup->admin_note = $request->input('admin_note');
            $mtopup->update();
            return redirect()->route('mtopup.index')
                ->with('success','Đơn hàng đã cập nhật thành công!');
        }
        elseif($mtopup->payment_status == 'paid'){

            DB::beginTransaction();
            try {
                $runTransaction = TransactionController::resetTransaction($mtopup->transaction_id);
                if( $runTransaction == 2 ) {
                    $mtopup->status = 'wrong';
                    $mtopup->payment_status = 'refund';
                    $mtopup->admin_note = $request->input('admin_note');
                    $mtopup->update();
                    //Thực hiện việc hoàn tiền
                    DB::commit();
                }
            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

            if( $runTransaction == 2 )
            {
                return redirect()->route('mtopup.index')
                    ->with('success','Mtopup đã cập nhật và hoàn tiền thành công!');
            }else{
                return redirect()->route('mtopup.index')
                    ->withErrors(['message'=>'Hoàn tiền không thành công']);
            }
        }

    }

    public function setMtopupNAPTIEN($request, $id)
    {
        $mtopup = Mtopup::findOrFail($id);
        if( $mtopup->status != 'none' )
        {
            return redirect()->route('mtopup.index')
                ->withErrors(['message'=>'Bạn phải reset lại đơn hàng mới được thiết lại lại!']);
        }
        if( $request->input('completed_value') > $mtopup->declared_value - $mtopup->completed_value )
        {
            return redirect()->route('mtopup.index')
                ->withErrors(['message'=>'Số tiền nạp lớn hơn số tiền cần nạp!']);
        }
        if( $mtopup->mix == 1 )
        {
            $completed = $mtopup->completed_value;
            $mtopup->admin_note = $request->input('admin_note');
            $mtopup->completed_value = $completed + $request->input('completed_value');
            if( $mtopup->declared_value == $completed + $request->input('completed_value') )
            {
                $mtopup->status = 'completed';
            }
            $mtopup->update();
            return redirect()->route('mtopup.index')
                ->with('success','Đơn hàng đã cập nhật thành công!');
        }else{
            if( $mtopup->declared_value !=  $request->input('completed_value') )
            {
                return redirect()->route('mtopup.index')
                    ->withErrors(['message'=>'Không được gộp! Số tiền nạp không bằng số tiền cần nạp!']);
            }else{
                $mtopup->admin_note = $request->input('admin_note');
                $mtopup->completed_value = $request->input('completed_value');
                $mtopup->status = 'completed';
                $mtopup->update();
                return redirect()->route('mtopup.index')
                    ->with('success','Đơn hàng đã cập nhật thành công!');
            }
        }

    }


    /*
         * Index
         */
    public function index(Request $request)
    {
        $title = "Danh sách thuê bao nạp chậm";
        $listmtopups = Mtopup::orderBy('id', 'DESC')->paginate(40);
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $title = "Search: " . $keyword;
            $listmtopups = Mtopup::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(40);
        }
        return view("Mtopup::listmtopup", compact('title', 'listmtopups'));
    }


    /** ---------------- AJAX ADMIN ---------------------- **/
    public function ajaxMtopup2charging($mtopup_id)
    {
        $mtopup = Mtopup::findOrFail($mtopup_id);
        /* Chi lấy giá trị thẻ phù hợp */
        $canPrice = $mtopup->declared_value - $mtopup->completed_value;
        $lsAmount = MtopupTelco::where('key',$mtopup->telco)->first();
        $lsAmount = explode(',',$lsAmount->value);
        if( $mtopup->mix == 1 )
        {
            foreach( $lsAmount as $key => $value )
            {
                if( $value > $canPrice  )
                {
                    unset($lsAmount[$key]);
                }
            }
        }else{
            foreach( $lsAmount as $key => $value )
            {
                if( $value != $canPrice  )
                {
                    unset($lsAmount[$key]);
                }
            }
        }

        return view("Mtopup::ajax.mtopup2charging", compact('mtopup','cards', 'lsAmount'));
    }

    /** ---------------- SETTING ---------------------- **/

    public function settings()
    {
        $setting = ''; //ChargingSetting::get();
        $groups = Group::orderBy('id','DESC')->get();
        $telcos = MtopupTelco::orderBy('id','DESC')->get();
        $fees = new MtopupFees;
        return view("Mtopup::settings", compact('setting','groups','telcos', 'fees') );
    }
    /** ----- Telco ----- **/
    /*
     * View page Create Telco
     */
    public function createTelco()
    {
        return view("Mtopup::create-telco" );
    }

    /*
     * View Page Edit Telco
     */
    public function editTelco($id)
    {
        $telco = MtopupTelco::findOrFail($id);
        return view("Mtopup::edit-telco", compact('telco') );
    }
    /*
     * Create Telco
     */
    public function postCreateTelco(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'key'     => 'required',
            'value' => 'required'
        ]);
        $mtopup = new MtopupTelco;
        $mtopup->name = $request->input('name');
        $mtopup->key = $request->input('key');
        $mtopup->number_format = $request->input('number_format');
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
        return redirect()->route('mtopup.settings')
            ->with('success','Telco created successfully');
    }
    /*
     * Request Setting Telco
     */
    public function postUpdateTelco($id, Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'key'     => 'required',
            'value' => 'required'
        ]);
        $mtopup = MtopupTelco::findOrFail($id);
        $mtopup->name = $request->input('name');
        $mtopup->key = $request->input('key');
        $mtopup->number_format = $request->input('number_format');
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
        return redirect()->route('mtopup.settings')
            ->with('success','Telco Updated successfully');
    }
    /*
     * Destroy Telco
     */
    public function destroyTelco($id)
    {
        MtopupTelco::find($id)->delete();
        return redirect()->route('mtopup.settings')
            ->with('success','Telco deleted successfully');
    }

    /*
     * Update Mtopup Fees
     */

    public function updateFees(Request $request)
    {
        $val   = $request->input('val');
        $telco = $request->input('telco');
        $telco_type = $request->input('telco_type');
        $group = $request->input('group');
        $key   = $request->input('key');
        $fees = DB::table('mtopup_fees')->where('telco_key',$telco)->where('telco_type',$telco_type)->where('group',$group)->first();
        if( $fees )
        {
            $input[$key] = ( $val > 0 ) ? $val : 0;
            $input['updated_at'] = now();
            DB::table('mtopup_fees')->where('telco_key',$telco)->where('telco_type',$telco_type)->update($input);
            return response('Update Success', 200)
                ->header('Content-Type', 'text/plain');
        }else{
            $input['telco_key']  = $telco;
            $input['telco_type'] = $telco_type;
            $input['group'] = $group;
            $input[$key] = ( $val > 0 ) ? $val : 0;
            $input['created_at'] = now();
            $input['updated_at'] = now();
            DB::table('mtopup_fees')->insert($input);
            return response('Create Success', 200)
                ->header('Content-Type', 'text/plain');
        }
        return response('Errors', 404)
            ->header('Content-Type', 'text/plain');
    }

}


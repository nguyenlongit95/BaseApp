<?php

namespace App\Modules\Localbank\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use App\Modules\Localbank\Models\Localbank;


class LocalbankController extends BackendController
{

	public function index(Request $request)
	{
		$title    = "Quản lý ngân hàng nội địa";
		$localbanks = Localbank::orderBy('id','DESC')->paginate(20);
		if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $localbanks = Localbank::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(20);
        }
		return view("Localbank::index", compact('title','localbanks'));
	}

	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$title    = "Quản lý ngân hàng nội địa";
            return view('Localbank::create',compact('title'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

	public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'acc_num' => 'required',
            'acc_name' => 'required',
            'sort' => 'numeric'
        ]);

        $input = $request->all();

        ( isset($input['status']) ) ? $input['status'] = 1 : $input['status'] = 0;
        ( isset($input['deposit']) ) ? $input['deposit'] = 1 : $input['deposit'] = 0;
        ( isset($input['withdraw']) ) ? $input['withdraw'] = 1 : $input['withdraw'] = 0;

        Localbank::create($input);
        return redirect()->route('localbank.index')
                        ->with('success','Thêm ngân hàng thành công');
    }

    public function edit($id)
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {

            $title    = "Sửa ngân hàng";
        	$localbank  = Localbank::find($id);
            return view('Localbank::edit',compact('title','localbank'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'acc_num' => 'required',
            'acc_name' => 'required',
            'sort' => 'numeric'
        ]);

        $localbank = Localbank::find($id);
        if(isset($request->deposit))
        {
        	$localbank->deposit = 1;
        }else{
            $localbank->deposit = 0;
        }
        if(isset($request->withdraw))
        {
            $localbank->withdraw = 1;
        }else{
            $localbank->withdraw = 0;
        }
        if(isset($request->status))
        {
            $localbank->status = 1;
        }else{
            $localbank->status = 0;
        }
        $localbank->code = $request->code;
        $localbank->name = $request->name;
        $localbank->acc_num = $request->acc_num;
        $localbank->acc_name = $request->acc_name;
        $localbank->branch = $request->branch;
        $localbank->link = $request->link;
        $localbank->info = $request->info;
        $localbank->icon = $request->icon;
        $localbank->sort = $request->sort;
        $localbank->save();
        return redirect()->route('localbank.index')
                        ->with('success','Cập nhật ngân hàng thành công');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	Localbank::find($id)->delete();
            return redirect()->route('localbank.index')
                        ->with('success','Ngân hàng đã được xóa');
        }else{
            return redirect()->route('localbank.index')
                        ->withErrors(['message' =>'Not access.']);
        }
    }

}
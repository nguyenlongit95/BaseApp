<?php
namespace App\Modules\Localbank\Controllers;

use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontendController;
use App\Modules\Localbank\Models\LocalbankUser;
use DB;
use Auth;

class LocalbankFrontController extends FrontendController
{

    public function localbank() {
        $listbanks = DB::table('localbanks_user')
            ->leftJoin('localbanks', 'localbanks_user.code', '=', 'localbanks.code')
            ->select('localbanks.name', 'localbanks_user.*')
            ->where('localbanks_user.user_id', Auth::user()->id)
            ->get();

        $listbanknames = DB::table('localbanks')->select('code','name')->get();
        return view('frontend.account.localbank', compact('listbanks', 'listbanknames'));
    }

    public function postlocalbank(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'acc_name' => 'required',
            'acc_num' => 'required'
        ]);

        $input = $request->all();
        $input['user_id'] = 1;
        $input['approved'] = 0;

            LocalbankUser::create($input);
            return redirect()->route('user.localbank')
                ->with('frontsuccess','Thêm ngân hàng thành công');

    }




}
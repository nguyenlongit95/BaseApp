<?php

namespace App\Modules\Backend\Controllers;

use App\Modules\Mtopup\Models\Mtopup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use DB;
use App\User;
class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        View::addLocation(resource_path('views').'/'.config('backend.template'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        $title = "Bảng quản trị";
        $listmtopups = Mtopup::orderBy('id', 'DESC')->paginate(10);
        $lsUser = User::orderBy('created_at','DESC')->limit(8)->get();
        $count_all_user = User::count();
        $count_today_user = User::whereDate('created_at', Carbon::today() )->count();
        return view('dashboard', compact('title', 'listmtopups','lsUser','count_all_user','count_today_user'));
    }

    protected function ajaxActions(Request $request)
    {
        $action = $request->input('action');
        switch ($action) {
            case 'updateToggle':
                $this->updateToggle($request);
                break;
            default:
                break;
        }
    }
    protected function updateToggle($request)
    {

        $table = $request->input('table');
        $id    = $request->input('id');
        $col   = $request->input('col');

        $row = DB::table($table)->where('id', $id)->first();
        if($row)
        {
            ( $row->$col == 1 ) ? $update = 0 : $update = 1;
            DB::table($table)->where('id',$id)->update([$col => $update]);
        }
    }


}

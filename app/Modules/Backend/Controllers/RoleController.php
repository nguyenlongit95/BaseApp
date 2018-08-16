<?php


namespace App\Modules\Backend\Controllers;


use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class RoleController extends BackendController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Roles Management";
        $roles = Role::orderBy('id','DESC')->paginate(10);
        //Search keyword
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $roles = Role::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
        }
        return view('Backend::roles.index',compact('roles', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $title = 'Roles Management';
        return view('roles.create',compact('title','permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name'), 'guard_name' => $request->input('guard_name') ]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Roles Management";
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('roles.edit',compact('title','role','permission','rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'guard_name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name       = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }

    public function actions(Request $request)
    {
        $val    = $request->check;
        $action = $request->action;
        if(empty($val)){
            return redirect()->route('roles.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $user = Role::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('roles.index')->with('success','Roles  '.$action.' successfully');
    }

    private function _runAction($id, $action)
    {
        switch ($action) {
            case 'delete':
                $this->destroy($id);
                break;
            
            default:
                break;
        }
        return null;
    }
}
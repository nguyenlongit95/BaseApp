<?php
namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Auth;
use Validator;
use Hash;
use App\User;
use View;
use DB;
use App\Modules\Group\Models\Group;

class UserController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $title = 'User Management';
        View::share ('title', $title );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::orderBy('id','DESC')->paginate(10);
        if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $users = User::where('name', 'LIKE', '%'.$keyword.'%')->where('email', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
        }

        return view('User::index',compact('title','users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            $groups = Group::get();
            foreach($groups as $group)
            {
                $lsGroup[$group->id]  = $group->name;
            }
            $roles = Role::pluck('name','name')->all();
            return view('User::create',compact('roles','lsGroup'));
        }else{
            echo 'Not Access';
            return ;
        }
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'gender' => 'required',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            $user->assignRole($request->input('roles'));
        }else{
            $input['roles'] = 'USER';
            $user->assignRole($input['roles']);
        }
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('User::show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $groups = Group::get();
        foreach($groups as $group)
        {
            $lsGroup[$group->id]  = $group->name;
        }
        $userRole = $user->roles->pluck('name','name')->all();

        return view('User::edit',compact('user','roles','userRole', 'lsGroup'));
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
        $validatedData = Validator::make($request->all(),
            [
                'name'     => 'required',
                'email'    => 'required|email|unique:users,email,'.$id,
                'phone'    => 'unique:users,phone,'.$id,
                'gender'   => 'required',
                'password' => 'same:confirm-password',
                'roles'    => 'required'
            ]
        );
        if ($validatedData->fails()) {
            return redirect(url(config('backend.backendRoute').'/users/'.$id.'/edit'))->withErrors($validatedData)->withInput();
        }

        if(!empty($request->input('password'))){
            $validatedData = Validator::make($request->all(),['password' => 'required|confirmed|min:6']);
            $user->password = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->name   = $request->name;
        $user->phone  = $request->phone;
        $user->gender = $request->gender;
        $user->group  = $request->group;
        $user->save();

        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
        }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( $id == 1 )
        {
            return redirect()->route('users.index')
                ->withErrors(['message' =>'Admin account can not delete!!!']);
        }

        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            if(auth()->user()->id == $id )
            {
                return redirect()->route('users.index')
                        ->withErrors(['message' =>'You can not delete your account!.']);
            }
            User::find($id)->delete();
            return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
        }else{
            return redirect()->route('users.index')
                        ->withErrors(['message' =>'Not access.']);
        }
    }

     public function actions(Request $request)
    {
        $val    = $request->check;
        $action = $request->action;
        if(empty($val)){
            return redirect()->route('users.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $user = User::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('users.index')->with('success','User  '.$action.' successfully');
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

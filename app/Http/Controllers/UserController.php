<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\UsersReporitoryInterface;

class UserController extends Controller
{
    //
    protected $UserRepository;

    public function __construct(UsersReporitoryInterface $usersReporitory)
    {
        $this->UserRepository = $usersReporitory;
    }
    public function index(){
        $Users = $this->UserRepository->getAll();
        return view('admin.Users.index', ['Users'=>$Users]);
    }

    public function show($id){
        $User = $this->UserRepository->find($id);
        return $User;
    }

    public function getStore(){
        return view('admin.Users.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $User = $this->UserRepository->create($data);
        if($User == true){
            $this->index();
        }else{
            return redirect()->back()->with('thong_bao','Add new item failed');
        }
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $User = $this->UserRepository->update($data,$id);
        if($User == true){
            return redirect()->back()->with('thong_bao','Update an item success!');
        }else{
            return redirect()->back()->with('thong_bao','Update an item failed!');
        }
    }

    public function destroy($id){
        $User = $this->UserRepository->delete($id);
        if($User == true){
            return redirect('admin/User/Users')->with('thong_bao','Delete an item success!');
        }else{
            return redirect('admin/User/Users')->with('thong_bao','Delete an item failed');
        }
    }

    /*
     * Các phương thức mở rộng khác được viết ở đây
     * Phương thức getUpdate
     * */
    public function getUpdate($id){
        $User = $this->show($id);
        return view('admin.Users.update',['User'=>$User]);
    }
}

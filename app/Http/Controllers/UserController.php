<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\UsersRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class UserController extends Controller
{
    //
    protected $UserRepository;

    public function __construct(UsersRepositoryInterface $usersReporitory)
    {
        $this->UserRepository = $usersReporitory;
    }
    public function index(){
        $Users = $this->UserRepository->getAll(30);
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
        $User->assignRole("USER");
        if($User == true){
            $this->index();
        }else{
            return redirect()->back()->with('thong_bao','Add new item failed');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            "Avatar"=>"required,image|mimes:jpeg,png,jpg,gif|max:2048"
        ],[
            "Avatar.required"=>"Please chose a image",
            "Avatar.image"=>"Wrong image format",
            "Avatar.max"=>"Image has max size"
        ]);
        $data = $request->all();
        if($file = $request->hasFile("Avatar")){
            $file = $request->file("Avatar");
            $fileExtendtion = $file->getClientOriginalExtension();
            if($fileExtendtion == "jpg" || $fileExtendtion == "jpeg" || $fileExtendtion == "png" || $fileExtendtion == "gif" || $fileExtendtion == "JPG" || $fileExtendtion == "PNG"){
                /*
                 * Kiểm tra và xóa hình ảnh cũ trong thư mục Avatar
                 * */
                $checkImage = $this->UserRepository->deleteImage($id);
                if($checkImage == 0){
                    return redirect()->back()->with('thong_bao','Update an item failed, please again image!');
                }else if($checkImage == 2){
                    return redirect()->back()->with('thong_bao','Update an item failed, image has not exits!');
                }else if($checkImage == 1){
                    // Tiến hành gửi hình ảnh vào thư mục
                    $fileName = str_random(3) . "_" . $file->getClientOriginalName();
                    if($file->move("upload/Avatar",$fileName)){
                        $User = $this->UserRepository->update($data,$id);
                        if($User == true){
                            return redirect()->back()->with('thong_bao','Update an item success!');
                        }else{
                            return redirect()->back()->with('thong_bao','Update an item failed!');
                        }
                    }else{
                        return redirect()->back()->with('thong_bao','Upload image failed, please check again system!');
                    }
                }
            }else{
                return redirect()->back()->with('thong_bao','Wrong image type!');
            }
        }else{
            return redirect()->back()->with('thong_bao','Please chose a image');
        }
    }

    public function destroy($id){
        $checkImage = $this->UserRepository->deleteImage($id);
        if($checkImage == 1){
            $User = $this->UserRepository->delete($id);
            if($User == true){
                return redirect('admin/User/Users')->with('thong_bao','Delete an item success!');
            }else{
                return redirect('admin/User/Users')->with('thong_bao','Delete an item failed');
            }
        }else if($checkImage == 0){
            return redirect('admin/User/Users')->with('thong_bao','Delete an item failed, please check again system');
        }else if($checkImage == 2){
            return redirect('admin/User/Users')->with('thong_bao','Delete an item failed, please check again file in system');
        }
    }

    /*
     * Các phương thức mở rộng khác được viết ở đây
     * Phương thức getUpdate
     * */
    public function getUpdate($id){
        $User = $this->show($id);
        $roles = Role::all();
        /*
         * Tại đây sử dụng QueryBuilder
         * Lấy ra các bản ghi đc nối với bảng Users và Roles
         * Trả về danh sách các bản ghi đó
         * Tiến hành so sánh với $roles của bảng roles
         * Nếu trùng thì hiển thị active và ngược lại.
         * */
        $userRole = $User->roles->all();
        return view('admin.Users.update',[
            'User'=>$User,
            'roles'=>$roles,
            'userRole'=>$userRole
        ]);
    }
}

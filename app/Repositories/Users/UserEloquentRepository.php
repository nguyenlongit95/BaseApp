<?php
/*
 * Tại đây ta khai báo các phương thức cụ thể cho đối tượng
 * Class này sẽ extends EloquentRepository và Implements xxxRepositoryInterface
 * */
namespace App\Repositories\Users;
use App\Rattings;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\File;

class UserEloquentRepository extends EloquentRepository implements UsersReporitoryInterface{
    /*
     * Tại đây ta sẽ khai báo chi tiết các phương thức đặc biệt
     * Ta khai báo chi tiết cho phương thức getModel
     * */
    public function deleteImage($id)
    {
        // TODO: Implement deleteImage() method.
        $User = User::findOrFail($id);
        if(file_exists("upload/Avatar".$User->Avatar)){
            if(File::delete("upload/Avatar".$User->Avatar)){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 2;
        }
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\User::class;
    }
}

?>

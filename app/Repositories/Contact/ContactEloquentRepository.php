<?php
/*
 * Tại đây ta khai báo các phương thức cụ thể cho đối tượng
 * Class này sẽ extends EloquentRepository và Implements CateogryRepositoryInterface
 * */
namespace App\Repositories\Contact;

use App\Repositories\Eloquent;
use App\Repositories\Eloquent\EloquentRepository;
use App\Contacts;

class ContactEloquentRepository extends EloquentRepository implements ContactReporitoryInterface{

    public function changeState($id,$State)
    {
        // TODO: Implement changeState() method.
        $Contact = Contacts::findOrFail($id);
        if($Contact->State == 0){
            $Contact->State = 1;
            $Contact->save();
            return 1;
        }else if($Contact->State == 1){
            $Contact->State = 0;
            $Contact->save();
            return 1;
        }
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Contacts::class;
    }
}

?>

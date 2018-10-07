<?php
/*
 * Tại đây ta khai báo các phương thức cụ thể cho đối tượng
 * Class này sẽ extends EloquentRepository và Implements CateogryRepositoryInterface
 * */
namespace App\Repositories\Comments;

use App\CategoriesBlog;
use App\Comments;
use App\Repositories\Eloquent;
use App\Repositories\Eloquent\EloquentRepository;

class CommentEloquentRepository extends EloquentRepository implements CommentReporitoryInterface{

    public function getParent_id($id){
        $Comment = Commeent::findOrFail($id)->SELECT("Parent_id")->get();
        return $Comment;
    }

    public function getReply($id)
    {
        // TODO: Implement getReply() method.
        $Comment = Comments::WHERE(
            "Parent_id",
            "=",
            $id
        )->SELECT(
            "id",
            "idBlog",
            "idUser",
            "Comment",
            "Author",
            "State",
            "created_at"
        )->paginate(10);
        return $Comment;
    }

    public function getIdBlog($id)
    {
        // TODO: Implement getIDBlog() method.
        $Comment = Comments::findOrFail($id)->select("idBlog")->first();
        return $Comment;
    }
    public function getIdUser($id)
    {
        // TODO: Implement getIdUser() method.
        $Comment = Comments::findOrFail($id)->select("idUser")->first();
        return $Comment;
    }
    public function updateState($id,$State){
        $Comment = Comments::findOrFail($id);
        $Comment->State = $State;
        if($Comment->update()){
            return 1;
        }else{
            return 0;
        }
    }
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Comments::class;
    }
}

?>

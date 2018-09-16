<?php
/*
 * Tại đây ta khai báo các phương thức cụ thể cho đối tượng
 * Class này sẽ extends EloquentRepository và Implements CateogryRepositoryInterface
 * */
namespace App\Repositories\Blogs;

use App\Blogs;
use App\Repositories\Eloquent;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Blogs\BlogReporitoryInterface;
use App\CategoriesBlog;

class BlogEloquentRepository extends EloquentRepository implements BlogReporitoryInterface{
    /*
     * Tại đây ta sẽ khai báo chi tiết các phương thức đặc biệt
     * Ta khai báo chi tiết cho phương thức getModel
     * */
    public function getCategories(){

    }

    public function getDescription(){

    }

    public function Search(){

    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Blogs::class;
    }
}

?>

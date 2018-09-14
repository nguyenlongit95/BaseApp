<?php
/*
 * Tại đây ta khai báo các phương thức cụ thể cho đối tượng
 * Class này sẽ extends EloquentRepository và Implements CateogryRepositoryInterface
 * */
namespace App\Repositories\ImageProduct;

use App\Products;
use App\ImageProducts;
use App\Repositories\Eloquent;
use App\Repositories\Eloquent\EloquentRepository;

class ImageProductEloquentRepository extends EloquentRepository implements ImageProductReporitoryInterface{
    /*
     * Lấy hình ảnh của 1 sản phẩm
     * Thay đổi hình ảnh của sản phẩm đó
     * */
    public function getImages($idProduct){
        $ImageProduct = ImageProducts::WHERE('idProduct','=',$idProduct)->SELECT('id','ImageProduct','idProduct')->get();
        return $ImageProduct;
    }
    /*
     * Tiến hành thay đổi kích cỡ hình ảnh tại đây
     * */
    public function ResizeImage($id){
        // TODO: Implement ResizeImage() method.
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\ImageProducts::class;
    }
}

?>

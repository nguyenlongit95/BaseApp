<?php
/*
 * Tại đây ta sẽ khai báo các phương thức có thêm của 1 đối tượng
 * Các phương thức khai báo ở đây sẽ không có trong EloquentRepository
 * Các phương thức khai báo ở đây chỉ có tác dụng trong module CategoryProducts
 * */
namespace App\Repositories\ImageProduct;

interface ImageProductReporitoryInterface{
    /*
     * Khai báo các phương thức có đặc điểm riêng của từng Products
     * Update hình ảnh
     * Delete hình ảnh
     * Lấy thông tin hình ảnh
     * Thay đổi kích cỡ hình ảnh
    */
    public function getImages($idProduct);

    public function ResizeImage($id);
}

?>

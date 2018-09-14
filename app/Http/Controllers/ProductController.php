<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Products\ProductReporitoryInterface;
use App\Repositories\ImageProduct\ImageProductReporitoryInterface;

class ProductController extends Controller
{
    //
    /*
     *
     * Tại đây ta gọi và sử dungj các Repository một cách đơn giản
     * Mỗi một phương thức gọi ta dùng 1 phương thức.
     *
     * */
    // Đây là biến trung gian để gọi đến Interface
    protected $ProductRepository;
    protected $ImageProductRepository;
    // Phương thức khởi tạo để gọi đến interface, Tham số đầu vào chính là interface
    public function __construct(ProductReporitoryInterface $repositoryProduct, ImageProductReporitoryInterface $imageProductReporitory)
    {
        $this->ProductRepository = $repositoryProduct;
        $this->ImageProductRepository = $imageProductReporitory;
    }

    /*
     * Tại đây ta xây dựng CURD một cách ngắn gọn như sau
     * index
     * show
     * update
     * delete
     * restore
     * */
    public function index(){
        $Products = $this->ProductRepository->getAll();
        return view('admin.Products.index', ['Products'=>$Products]);
    }

    public function show($id){
        $Product = $this->ProductRepository->find($id);
        return $Product;
    }

    public function getStore(){
        $Categories = $this->getCategories();
        return view('admin.Products.create',['Categories'=>$Categories]);
    }

    public function store(Request $request){
        $data = $request->all();
        $Products = $this->ProductRepository->create($data);
        if($Products == true){
            return redirect('admin/Product/Products')->with('thong_bao','Add new item success');
        }else{
            return redirect()->back()->with('thong_bao','Add new item failed');
        }
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $Product = $this->ProductRepository->update($data,$id);
        if($Product == true){
            return redirect()->back()->with('thong_bao','Update an item success!');
        }else{
            return redirect()->back()->with('thong_bao','Update an item failed!');
        }
    }

    public function destroy($id){
        $Product = $this->ProductRepository->delete($id);
        if($Product == true){
            return redirect('admin/Product/Products')->with('thong_bao','Delete an item success!');
        }else{
            return redirect('admin/Product/Products')->with('thong_bao','Delete an item failed');
        }
    }

    /*
     * Gọi đến các phương thức đặc biệt
     * Lấy Categories
     * Lấy Info
     * Lấy Image của sản phẩm
     * */
    public function getInfo(){
        $getInfoProduct = $this->ProductRepository->getInfo();
        return $getInfoProduct;
    }
    // Lấy Category của sản phẩm
    public function getCategories(){
        $Categories = $this->ProductRepository->getCategory();
        return $Categories;
    }
    public function getImageProduct($id){
        $ImageProduct = $this->ImageProductRepository->getImages($id);
        return $ImageProduct;
    }
    /*
     * Các phương thức mở rộng khác được viết ở đây
     * Phương thức getUpdate
     * */
    public function getUpdate($id){
        $showProcuct = $this->show($id);
        $getCategory = $this->getCategories();
        $ImageProduct = $this->getImageProduct($id);
        return view('admin.Products.update', ['Product'=>$showProcuct,'Category'=>$getCategory,'ImageProduct'=>$ImageProduct]);
    }

    /*
     * Lam viec voi hinh anh
     * Them
     * Sua
     * Xoa
     * */
    public function postAddImage(Request $request ,$id){
        // Upload hình ảnh tại đây

    }
    public function getDeleteImage($id){
        echo $id;
    }
}

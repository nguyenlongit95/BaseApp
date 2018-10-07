<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Repositories\Products\ProductReporitoryInterface;
use App\Repositories\ImageProduct\ImageProductReporitoryInterface;
use App\Repositories\Rattings\RattingsReporitoryInterface;
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
    protected $RattingRepository;
    // Phương thức khởi tạo để gọi đến interface, Tham số đầu vào chính là interface
    public function __construct(
        ProductReporitoryInterface $repositoryProduct,
        ImageProductReporitoryInterface $imageProductReporitory,
        RattingsReporitoryInterface $rattingsReporitory
    )
    {
        $this->ProductRepository = $repositoryProduct;
        $this->ImageProductRepository = $imageProductReporitory;
        $this->RattingRepository = $rattingsReporitory;
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
        $Products = $this->ProductRepository->getAll(15);
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
        $ImageProduct = $this->ImageProductRepository->getImages($id);
        foreach($ImageProduct as $item){
            if($item != null){
                $image = $this->deleteImage($item->id);
                switch ($image){
                    case 0:
                        return redirect()->back()->with('thong_bao','Delete Image failed');
                        break;
                    case 1:
                        $Product = $this->ProductRepository->delete($id);
                        if($Product == true){
                            return redirect('admin/Product/Products')->with('thong_bao','Delete an item success!');
                            break;
                        }else{
                            return redirect('admin/Product/Products')->with('thong_bao','Delete an item failed');
                            break;
                        }
                    case 2:
                        return redirect()->back()->with('thong_bao','Delete file image failed, please check again system');
                        break;
                    case 3:
                        return redirect()->back()->with('thong_bao','File has not exits in system!');
                        break;
                }
            }else{
                return redirect()->back()->with('thong_bao','Delete Image failed, please check again');
            }
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
        /*
         * Tại đây sẽ lấy ra Ratting của sản phẩm
         * Tại đây sẽ lấy ra số lượng trung bình của sản phẩm
         * */
        $RattingProduct = $this->RattingRepository->getProductRatting($id);
        $StarProduct = $this->RattingRepository->getStarAVG($id);
        return view('admin.Products.update', [
            'Product'=>$showProcuct,
            'Category'=>$getCategory,
            'ImageProduct'=>$ImageProduct,
            'RattingProduct'=>$RattingProduct,
            'StarProduct'=>$StarProduct
        ]);
    }

    /*
     * Lam viec voi hinh anh
     * Them
     * Sua
     * Xoa
     * */
    public function postAddImage(Request $request ,$id){
        // Upload hình ảnh tại đây
        // Hình ảnh upload sẽ được chuyển vào thư mục ../public/Product/
        $this->validate($request,[
           'ImageProduct'=>'required'
            ],[
            'ImageProduct.required'=>'Please chose a images'
        ]);
        if($request->hasFile('ImageProduct')){
            $file = $request->file('ImageProduct');
            $fileExtendtion = $file->getClientOriginalExtension();
            if($fileExtendtion == "jpg" || $fileExtendtion == "png" || $fileExtendtion == "JPG" || $fileExtendtion == "PNG" || $fileExtendtion == "jpeg"){
                $fileName = $file->getClientOriginalName();
                $Name = str_random(3) . $fileName;
                if($file->move("upload/Product/",$Name) && $this->callFunctionPostImage($Name, $id)){
                    // Sau khi lưu hình ảnh vào thư mục thì gọi dến phương thức thêm hình ảnh trong Repository
                    return redirect()->back()->with('thong_bao','Upload image success!');
                }else{
                    return redirect()->back()->with('thong_bao','Upload file failed, please check again system!');
                }
            }else{
                return redirect()->back()->with('thong_bao','The image is not formatted correctly!');
            }
        }else{
            return redirect()->back()->with('thong_bao','Please chose a images');
        }
    }
    public function getDeleteImage($id){
        $Image = $this->deleteImage($id);
        switch ($Image){
            case 0:
                return redirect()->back()->with('thong_bao','Delete Image failed');
                break;
            case 1:
                return redirect()->back()->with('thong_bao','Delete Image success');
                break;
            case 2:
                return redirect()->back()->with('thong_bao','Delete file image failed, please check again system');
                break;
            case 3:
                return redirect()->back()->with('thong_bao','File has not exits in system!');
                break;
        }
    }
    // More function: function ở đây để tách cho code của các function chính khỏi bị dài
    // Đạt đúng tiêu chuẩn của McCall: không nên để quá 3 lệnh if else trong 1 phương thức
    public function callFunctionPostImage($Image, $id){
        $AddImage = $this->ImageProductRepository->addImage($Image,$id);
        if ($AddImage == true) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteImage($id){
        // TODO: Implement deleteImage() method.
        $ImageProduct = $this->ImageProductRepository->find($id);
        if(file_exists("upload/Product/".$ImageProduct->ImageProduct)){
            if(File::delete("upload/Product/".$ImageProduct->ImageProduct)) {
                $deleteImage = $this->ImageProductRepository->delete($id);
                if ($deleteImage) {
                    return 1;
                } else {
                    return 0;
                }
            }else{
                return 2;
            }
        }else{
            return 3;
        }
    }
}

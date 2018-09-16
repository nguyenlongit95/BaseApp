<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Blogs\BlogReporitoryInterface;
use App\Repositories\Blogs\BlogEloquentRepository;

use App\Repositories\CategoryBlogs\CategoryBlogReporitoryInterface;

class BlogController extends Controller
{
    //
    //
    /*
     *
     * Tại đây ta gọi và sử dungj các Repository một cách đơn giản
     * Mỗi một phương thức gọi ta dùng 1 phương thức.
     *
     * */
    // Đây là biến trung gian để gọi đến Interface
    protected $BlogRepositories;
    protected $CategoryBlogs;

    // Phương thức khởi tạo để gọi đến interface, Tham số đầu vào chính là interface
    public function __construct(BlogReporitoryInterface $reporitoryBlog, CategoryBlogReporitoryInterface $repositoryCategoryBlog)
    {
        $this->BlogRepositories = $reporitoryBlog;
        $this->CategoryBlogs = $repositoryCategoryBlog;
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
        $Blogs = $this->BlogRepositories->getAll();
        return view('admin.Blogs.index', ['Blogs'=>$Blogs]);
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

    public function getAddBlogs(){
        $CategoryBlogs = $this->CategoryBlogs->getAll();
        return view('admin.Blogs.create',['CategoryBlogs'=>$CategoryBlogs]);
    }
    public function getUpdateBlogs($id){
        $Blog = $this->BlogRepositories->find($id);
        $CategoryBlog = $this->CategoryBlogs->getAll();
        return view('admin.Blogs.update',['Blog'=>$Blog,'CategoryBlog'=>$CategoryBlog]);
    }
}

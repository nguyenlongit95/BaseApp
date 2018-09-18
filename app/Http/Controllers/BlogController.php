<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Blogs\BlogReporitoryInterface;

use App\Repositories\CategoryBlogs\CategoryBlogReporitoryInterface;

class BlogController extends Controller
{
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
        $Blogs = $this->BlogRepositories->find($id);
        return $Blogs;
    }

    public function getStore(){
        $Categories = $this->getCategories();
        return view('admin.Products.create',['Categories'=>$Categories]);
    }

    public function store(Request $request){
        $data = $request->all();
        $Blogs = $this->BlogRepositories->create($data);
        if($Blogs == true){
            return redirect('admin/Blog/Blogs')->with('thong_bao','Add new item success');
        }else{
            return redirect()->back()->with('thong_bao','Add new item failed');
        }
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $Blogs = $this->BlogRepositories->update($data,$id);
        if($Blogs == true){
            return redirect()->back()->with('thong_bao','Update an item success!');
        }else{
            return redirect()->back()->with('thong_bao','Update an item failed!');
        }
    }
    /*
     * Phương thức thay đổi hình ảnh của bài viết
     * Trước khi thay đổi hình ảnh thì phải xóa hình ảnh cũ đi
     * Tham số đầu vào là id của bài viết
     * Gọi đến phương thức xóa hình ảnh tại Eloquent
     * */
    public function changeImage(Request $request,$id){

    }

    /*
     * Khi xóa Blog thì phải xóa hình ảnh của Blog trước
     * Sau khi xóa thành công thì mới xáo Blog
     * Gọi đến phương thức xóa hình ảnh tại Eloquent
     * */
    public function destroy($id){
        $deleteImage = $this->BlogRepositories->deleteImageBlog($id);
        if($deleteImage == true){

        }else{

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

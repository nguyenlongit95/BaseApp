<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\RepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\CategoryProducts\CategoryProductReporitoryInterface;

class CategoryProductController extends Controller
{
    /*
     *
     * Tại đây ta gọi và sử dungj các Repository một cách đơn giản
     * Mỗi một phương thức gọi ta dùng 1 phương thức.
     *
     * */
    // Đây là biến trung gian để gọi đến Interface
    protected $CategoryRepository;
    // Phương thức khởi tạo để gọi đến interface, Tham số đầu vào chính là interface
    public function __construct(CategoryProductReporitoryInterface $repository)
    {
        $this->CategoryRepository = $repository;
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
        $CategoryProducts = $this->CategoryRepository->getAll();
        return view('admin.CategoryProducts.index', ['CategoryProducts'=>$CategoryProducts]);
    }

    public function show($id){
        $CategoryProducts = $this->CategoryRepository->find($id);
        return $CategoryProducts;
    }

    public function getStore(){
        return view('admin.CategoryProducts.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $CategoryProducts = $this->CategoryRepository->create($data);
        if($CategoryProducts){
            return view('admin.CategoryProducts.create')->with('thong_bao','Add new item success!');
        }else{
            return view('admin.CategoryProducts.index')->with('thong_bao','Add new item failed');
        }
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $CategoryProduct = $this->CategoryRepository->update($data,$id);
        if($CategoryProduct){
            return view('admin.CategoryProducts.update')->with('thong_bao','Update an item success!');
        }else{
            return view('admin.CategoryProducts.index')->with('thong_bao','Update an item failed');
        }
    }

    public function destroy($id){
        $CategoryProduct = $this->CategoryRepository->delete($id);
        if($CategoryProduct){
            return view('admin.CategoryProducts.index')->with('thong_bao','Delete an item success!');
        }else{
            return view('admin.CategoryProducts.index')->with('thong_bao','Delete an item failed');
        }
    }

    /*
     * Gọi đến các phương thức đặc biệt
     * Lấy Parent_id và id
     * Lấy Info
     * */
    public function getParentID(){
        $Parent_id = $this->CategoryRepository->getParent_id();
        return $Parent_id;
    }
    public function getInfo(){
        $getInfoCategoryProducts = $this->CategoryRepository->getInfo();
        return $getInfoCategoryProducts;
    }
}

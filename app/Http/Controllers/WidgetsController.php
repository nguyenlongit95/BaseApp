<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WidgetsController extends Controller
{
    /*
     * Widgets dùng để quản lý các thành phần cở bản của giao diện người dùng
     * Menus
     * Header
     * Footer
     * Sidebar
     * ...
     * Sẽ được cập nhật thêm trong quá trình phát triển và tùy từng thể loại sản phẩm
     * */
     public function index(){
         return view("admin.widgets");
     }
}

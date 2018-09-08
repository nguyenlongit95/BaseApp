<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /*
     * Quan tri chung cho website
     * Chia cac vung widgets tuong tu cho website
     * widget sẽ được hiểu là các thành phần phụ của website
     * */
    public function DashBoard(){
        return view('admin.index');
    }
}

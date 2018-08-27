<?php

namespace App\Modules\Order\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use App\Modules\Order\Models\Order;

use View;

class OrderFrontController extends BackendController
{
    public function index()
    {
        $title = "Order Management";
        $orders = Order::orderBy('id', 'DESC')->paginate(30);
        return view("Order::index", compact('title', 'orders') );
    }
    public function getViewPageMTopupIndex(){
        $title = "List Order";
        return view("frontend.pages.napnhanh");
    }
}

<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App;
use DB;
use View;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Modules\Wallet\Models\Wallet;
use App\Modules\Order\Models\Order;
use App\Modules\Menu\Controllers\MenuController;


class FrontendController extends Controller
{

    public function __construct()
    {
        /// Thiết lập ngôn ngữ website
        App::setLocale('vi');

        //// Tạo biến menu gửi ra view
        $menulist = new MenuController;
        ///// header lấy trong file config/menu.php
        $menu = $menulist->getMenuListBytype('header');
        View::share('menu', $menu);




    }

    public function index()
    {
        $sliderlist = new App\Modules\Sliders\Controllers\SlidersFrontController();
        $sliders = $sliderlist->renderSlider();
        View::share(['sliders'=> $sliders]);
        return view('frontend.pages.home');
    }

    public function napcham()
    {
        return view('frontend.pages.napcham');
    }

    public function giohang()
    {
        return view('frontend.pages.giohang');
    }

    public function viewcart()
    {
        return view('frontend.pages.viewcart');
    }

    public function password_reset()
    {
        return view('frontend.auth.password_reset');
    }



}

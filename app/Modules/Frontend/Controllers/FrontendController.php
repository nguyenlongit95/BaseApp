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
use App\Modules\Setting\Models\Setting;


class FrontendController extends Controller
{

    public function __construct()
    {
        $allSetting = Setting::all();
        foreach ($allSetting as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        View::share('settings', $settings);

        /// Thiết lập ngôn ngữ website
        App::setLocale($settings['language']);

        //// Tạo biến menu gửi ra view
        $menulist = new MenuController;
        ///// header lấy trong file config/menu.php
        $menu = $menulist->getMenuListBytype('header');
        View::share('menu', $menu);

        $footer_menu = $menulist->getMenuListBytype('footer');
        View::share('footer_menu', $footer_menu);

        $list_news = App\Modules\News\Controllers\NewsFrontController::getListNews(App::getLocale(),5);
        View::share('list_news', $list_news);


    }

    public function index()
    {
        $sliderlist = new App\Modules\Sliders\Controllers\SlidersFrontController();
        $sliders = $sliderlist->renderSlider();
        View::share(['sliders'=> $sliders]);

        $muamathe_html = app('App\Modules\Frontend\Controllers\SoftcardController')->renderContent();
        $napcham_html = view('frontend.widgets.napcham-content')->render();
        $taythecham_html = app('App\Modules\Charging\Controllers\ChargingFrontController')->renderContent();
        
        return view('frontend.pages.home',compact('muamathe_html','napcham_html','taythecham_html'));
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

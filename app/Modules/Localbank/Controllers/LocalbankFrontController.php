<?php
namespace App\Modules\Localbank\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;

class LocalbankFrontController extends FrontendController
{
    public function index() {

        return view('frontend.account.userbank');

    }
}
<?php

namespace App\Modules\Frontend\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Modules\Wallet\Models\Wallet;

class AccountController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function changePassword()
    {
        return view('frontend.account.change-password');
    }

    public function wallet()
    {
        $wallet = Wallet::where('user', Auth::user()->id )->first();
        $balance = number_format($wallet->balance_decode);
        return view('frontend.account.wallet', compact('balance', 'wallet'));
    }


    public function profile()
    {
        return view('frontend.account.profile');
    }

    public function history()
    {
        return view('frontend.account.history');
    }

}

<?php

namespace App\Modules\Frontend\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App;
use \App\User;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Modules\Wallet\Models\Wallet;
use App\Modules\Wallet\Models\WalletHistory;

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
        $walletlists = Wallet::where('user', Auth::user()->id )->get();
        foreach ($walletlists as $key => $wallet) {
            $wallets[$key]['number'] = $wallet->number;
            $wallets[$key]['balance'] = number_format($wallet->balance_decode);
            $wallets[$key]['currency_code'] = $wallet->currency_code;
            $wallets[$key]['pending_balance'] = number_format($wallet->pending_balance);
            $wallets[$key]['status'] = $wallet->status;
        }


        return view('frontend.account.wallet', compact('wallets'));
    }


    public function profile()
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);

            $walletlists = Wallet::where('user', Auth::user()->id )->get();
            foreach ($walletlists as $key => $wallet) {
                $wallets[$key]['number'] = $wallet->number;
                $wallets[$key]['balance'] = number_format($wallet->balance_decode);
                $wallets[$key]['currency_code'] = $wallet->currency_code;
            }

        }


        return view('frontend.account.profile', compact('user', 'wallets'));

    }

    public function wallettrans()
    {
        $trans = WalletHistory::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('frontend.account.wallettrans', compact('trans'));
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Frontend\Controllers\FrontendController;
use App\Modules\Wallet\Controllers\WalletController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if( is_numeric($data['phoneOrEmail']) )
        {
            Validator::extend('number_phone', function($attribute, $value, $parameters, $validator) {
                if(!empty($value) && substr($value, 0, 1) == '0' ){
                    return true;
                }
                return false;
            });
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'phoneOrEmail' => 'required|string|number_phone|max:11|unique:users,phone',
                'password' => 'required|string|min:6',
                'captcha' => 'required|captcha',
            ]);
        }else{
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'phoneOrEmail' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6',
                'captcha' => 'required|captcha',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if( is_numeric($data['phoneOrEmail']) )
        {
            $user =  User::create([
                'name' => $data['name'],
                'email' => null,
                'phone' => $data['phoneOrEmail'],
                'password' => Hash::make($data['password']),
                'group'=>4
            ]);
            WalletController::makeWalletFromUserId($user->id);
            return $user;
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['phoneOrEmail'],
            'phone' => null,
            'password' => Hash::make($data['password']),
            'group'=>4
        ]);
        WalletController::makeWalletFromUserId($user->id);
        return $user;
    }
}

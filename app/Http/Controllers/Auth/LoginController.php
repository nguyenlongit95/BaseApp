<?php

namespace App\Http\Controllers\Auth;
use App\Modules\Frontend\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated()
    {

        if(auth()->user()->hasRole('BACKEND'))
        {
            $backenUrl = config('backend.backendRoute');
            return redirect('/'.$backenUrl);
        } 

        return redirect('/');
    }

    public function __construct()
    {   parent::__construct();
        $this->middleware('guest')->except('logout');
    }
}

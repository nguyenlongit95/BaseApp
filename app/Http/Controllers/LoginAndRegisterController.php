<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\UsersReporitoryInterface;

class LoginAndRegisterController extends Controller
{
    //
    protected $UserRepository;
    public function __construct(UsersReporitoryInterface $usersReporitory)
    {
        $this->UserRepository = $usersReporitory;
    }

    public function getLogin(){
        return view("Login");
    }
    public function postLogin(Request $request){
        echo $request->username;
    }
}

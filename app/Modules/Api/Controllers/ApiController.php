<?php

namespace App\Modules\Api\Controllers;

use App\Modules\Wallet\Models\Wallet;
use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use App\Modules\Wallet\Controllers\WalletController;

class ApiController extends BackendController
{

	public function test()
	{
        $a = new \App\Modules\Wallet\Controllers\WalletController;

        $a::makeWalletFromUserId(19);

	}

}

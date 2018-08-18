<?php

$namespace = 'App\Modules\Frontend\Controllers';

Route::group(['middleware' => ['web'], 'module'=>'Frontend', 'namespace' => $namespace], function () {

    Route::get('/', ['as' =>'home', 'uses' =>'FrontendController@index']);


    // Acount
    Route::get('/profile', ['as'=>'user.profile', 'uses'=>'AccountController@profile']);
    Route::get('/wallet', ['as'=>'user.wallet', 'uses'=>'AccountController@wallet']);
    Route::get('/wallet/transactions', ['as'=>'wallet.transaction', 'uses'=>'AccountController@wallettrans']);
    Route::get('/change-password', ['as'=>'user.changepassword', 'uses'=>'AccountController@changePassword']);


    ////Front area
    Route::get('/reset-password',['as'=>'reset-password', 'uses'=> 'FrontendController@password_reset']);

});


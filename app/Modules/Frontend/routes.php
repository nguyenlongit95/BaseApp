<?php

$namespace = 'App\Modules\Frontend\Controllers';

Route::group(['middleware' => ['web'], 'module'=>'Frontend', 'namespace' => $namespace], function () {

    Route::get('/', 'FrontendController@index');


    // Acount
    Route::get('/profile', 'AccountController@profile');
    Route::get('/wallet', 'AccountController@wallet');
    Route::get('/history', 'AccountController@wallet');
    Route::get('/change-password', 'AccountController@changePassword');
    Route::get('/reset-password',['as'=>'reset-password', 'uses'=> 'FrontendController@password_reset']);
});


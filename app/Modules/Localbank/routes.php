<?php

$namespace = 'App\Modules\Localbank\Controllers';
$as = config('backend.backendRoute');

//--FRONTEND
Route::group(['middleware' => ['web'], 'module'=>'Localbank', 'namespace' => $namespace], function () {

    Route::get('/nganhang.html',['as'=>'frontend.account.user-bank', 'uses'=> 'LocalbankFrontController@index'] );
});




Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Localbank', 'namespace' => $namespace], function () {
    
    Route::resource('/localbank','LocalbankController');
});
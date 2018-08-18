<?php

$namespace = 'App\Modules\Localbank\Controllers';
$as = config('backend.backendRoute');

//--FRONTEND
Route::group(['middleware' => ['web'], 'module'=>'Localbank', 'namespace' => $namespace], function () {

    Route::get('/user/localbank',['as'=>'user.localbank', 'uses'=> 'LocalbankFrontController@localbank']);
    Route::post('/user/localbank',['as'=>'user.localbank', 'uses'=> 'LocalbankFrontController@postlocalbank']);
});




Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Localbank', 'namespace' => $namespace], function () {
    
    Route::resource('/localbank','LocalbankController');
});
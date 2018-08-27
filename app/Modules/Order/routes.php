<?php

$namespace = 'App\Modules\Order\Controllers';

$as = config('backend.backendRoute');

//Frontend
Route::group(['middleware' => ['web'], 'module'=>'Order', 'namespace' => $namespace], function () {
    Route::get('/napnhanh.html', ['as'=>'frontend.page.napnhanhindex', 'uses' =>'OrderFrontController@getViewPageMTopupIndex']);

    Route::get('/napnhanh/success.html',['as'=>'frontend.topup.success', 'uses'=>'OrderFrontController@getViewCheckoutSuccess']);
    Route::get('/napnhanh/checkout.html',['as'=>'frontend.topup.checkout', 'uses'=>'OrderFrontController@viewPageCheckout']);
    Route::post('/napnhanh/postTopup',['as'=>'frontend.topup.postTopup', 'uses'=>'OrderFrontController@postTopup']);

    Route::post('/napnhanh/checkout.html',['as'=>'frontend.topup.postcheckout', 'uses'=>'OrderFrontController@postCheckoutTopup']);

    //Ajax
    Route::get('/napnhanh/ajax/getDiscount', 'TopupFrontController@getDiscountJson');
});



//Backend
Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Order', 'namespace' => $namespace], function () {
    Route::get('/orders','OrderController@index');
});

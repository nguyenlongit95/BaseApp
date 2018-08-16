<?php

$namespace = 'App\Modules\Softcard\Controllers';

$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Softcard', 'namespace' => $namespace], function () {
    Route::resource('softcard','SoftcardController');
    Route::post('softcard/actions','SoftcardController@actions');
});

//Frontend
Route::group(['middleware' => ['web'], 'module'=>'Softcard', 'namespace' => $namespace], function () {
    Route::get('muamathe/success.html', ['as'=>'frontend.softcard.success', 'uses'=>'SoftcardFrontController@getPageSuccess']);

    Route::get('/muamathe.html',['as'=>'page.softcard', 'uses'=> '\App\Modules\Frontend\Controllers\SoftcardController@index'] );
    Route::post('muamathe.html','\App\Modules\Frontend\Controllers\SoftcardController@ajaxPost')->name('softcard.ajaxpost');
    Route::get('/muamathe/checkout.html', ['as'=>'softcard.getcheckout', 'uses'=>'SoftcardFrontController@getOrderSoftcard']);
    Route::post('/muamathe/checkout.html', ['as'=>'softcard.postcheckout', 'uses'=>'SoftcardFrontController@postCheckoutSoftcard']);
});

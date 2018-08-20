<?php

$namespace = 'App\Modules\Mtopup\Controllers';
$as = config('backend.backendRoute');


//Frontend
Route::group(['middleware' => ['web'], 'module'=>'MTopup', 'namespace' => $namespace], function () {
    Route::get('/napcham.html', ['as'=>'frontend.page.napchamindex', 'uses' =>'MtopupFrontController@getViewPageMTopupIndex']);

    Route::get('/napcham/success.html',['as'=>'frontend.mtopup.success', 'uses'=>'MtopupFrontController@getViewCheckoutSuccess']);
    Route::get('/napcham/checkout.html',['as'=>'frontend.mtopup.checkout', 'uses'=>'MtopupFrontController@viewPageCheckout']);
    Route::post('/napcham/postMtopup',['as'=>'frontend.mtopup.postMtopup', 'uses'=>'MtopupFrontController@postMtopup']);

    Route::post('/napcham/checkout.html',['as'=>'frontend.mtopup.postcheckout', 'uses'=>'MtopupFrontController@postCheckoutMtopup']);

    //Ajax
    Route::get('/mtopup/ajax/getDiscount', 'MtopupFrontController@getDiscountJson');
});


//Backend
Route::group(['prefix' => $as, 'middleware' => ['web','auth', 'role:BACKEND'], 'module'=>'MTopup', 'namespace' => $namespace], function () {

    Route::get('/mtopup',['as'=>'mtopup.index','uses'=>'MtopupController@index']);
    Route::get('/mtopup/telcos/create','MtopupController@createTelco');
    Route::post('/mtopup/telcos/postcreate',['as'=>'mtopup.telcopostcreate','uses'=>'MtopupController@postCreateTelco']);
    Route::get('/mtopup/telcos/{id}/edit','MtopupController@editTelco');
    Route::patch('/mtopup/telcos/{id}/update',['as'=>'mtopup.telcopostupdate','uses'=>'MtopupController@postUpdateTelco']);
    Route::delete('/mtopup/telcos/{id}','MtopupController@destroyTelco');

    Route::get('/mtopup/settings',['as'=>'mtopup.settings','uses'=>'MtopupController@settings']);

    //Route::get('/mtopup/{id}','MtopupController@mtopup2charging');

    Route::post('/mtopup/update-fees','MtopupController@updateFees');

    //Ajax
    Route::get('/ajax/mtopup/{id}','MtopupController@ajaxMtopup2charging');
    Route::post('/ajax/mtopup/{id}',['as'=>'ajax.mtopup.actions','uses'=>'MtopupController@mtopupAjaxActions']);
});


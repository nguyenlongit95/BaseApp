<?php

$namespace = 'App\Modules\AutoCharging\Controllers';
$as = config('backend.backendRoute');

//--FRONTEND
Route::group(['middleware' => ['web'], 'module'=>'AutoCharging', 'namespace' => $namespace], function () {
    //Tay the cham
    Route::get('/taythenhanh.html',['as'=>'frontend.pages.taythenhanh', 'uses'=> 'AutoChargingFrontController@viewPageFrontCharging'] );
    Route::post('/taythenhanh.html', ['as'=>'frontend.charging.postAutoCharging', 'uses'=>'AutoChargingFrontController@insertCharging']);
});

/// API

Route::group(['middleware' => ['api'], 'module'=>'AutoCharging', 'namespace' => $namespace], function () {
    //Tay the cham
    Route::get('/autochargingws',['as'=>'frontend.api.autocharging', 'uses'=> 'AutoChargingApiController@blankPage'] );
    Route::get('/autochargingws/{trans_id}/{request_id}',['as'=>'frontend.api.charging.status', 'uses'=> 'AutoChargingApiController@getCheckStatus'] );
    Route::post('/autochargingws',['as'=>'frontend.api.autocharging', 'uses'=> 'AutoChargingApiController@postApiAutoCharging'] );

});


//--BACKEND
Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'AutoCharging', 'namespace' => $namespace], function () {

    Route::get('/autochargings',['as'=>'autochargings.index','uses'=>'AutoChargingController@index']);
    Route::get('/autochargings/history',['as'=>'autochargings.history','uses'=>'AutoChargingController@history']);
    Route::get('/autochargings/settings',['as'=>'autochargings.settings','uses'=>'AutoChargingController@settings']);
    Route::get('/autochargings/makecharge','AutoChargingController@makeCharge');
    Route::get('/autochargings/listmtopup','MtopupController@index');
    Route::get('/autochargings/maketopup','MtopupController@makeMtopup');
    Route::get('/autochargings/cards','AutoCardController@index');

    Route::get('/autochargings/reset/{id}','AutoChargingController@resetCharging');

    Route::post('/autochargings/update-fees','AutoChargingController@updateFees');

    Route::get('/autochargings/telcos/create','AutoChargingController@createTelco');
    Route::post('/autochargings/telcos/postcreate',['as'=>'autochargings.telcopostcreate','uses'=>'AutoChargingController@postCreateTelco']);
    Route::get('/autochargings/telcos/{id}/edit','AutoChargingController@editTelco');
    Route::patch('/autochargings/telcos/{id}/update',['as'=>'autochargings.telcopostupdate','uses'=>'AutoChargingController@postUpdateTelco']);
    Route::delete('/autochargings/telcos/{id}','AutoChargingController@destroyTelco');



    //AJAX
    Route::get('/ajax/autocharging/{id}',['as'=>'ajax.charging','uses'=>'AutoChargingController@ajaxChargingMaster']);
    Route::post('/ajax/autocharging/{id}',['as'=>'ajax.charging.actions','uses'=>'AutoChargingController@ajaxChargingActions']);
});


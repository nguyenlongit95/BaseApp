<?php

$namespace = 'App\Modules\Charging\Controllers';
$as = config('backend.backendRoute');

//--FRONTEND
Route::group(['middleware' => ['web'], 'module'=>'Charging', 'namespace' => $namespace], function () {
    //Tay the cham
    Route::get('/taythecham.html',['as'=>'frontend.pages.taythecham', 'uses'=> 'ChargingFrontController@viewPageFrontCharging'] );
    Route::post('/taythecham.html', ['as'=>'frontend.charging.postCharging', 'uses'=>'ChargingFrontController@insertCharging']);
});

/// API

Route::group(['middleware' => ['api'], 'module'=>'Charging', 'namespace' => $namespace], function () {
    //Tay the cham
    Route::get('/chargingws',['as'=>'frontend.api.charging', 'uses'=> 'ChargingApiController@blankPage'] );
    Route::get('/chargingws/{trans_id}/{request_id}',['as'=>'frontend.api.charging.status', 'uses'=> 'ChargingApiController@getCheckStatus'] );
    Route::post('/chargingws',['as'=>'frontend.api.charging', 'uses'=> 'ChargingApiController@postApiCharging'] );

});


//--BACKEND
Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Charging', 'namespace' => $namespace], function () {

    Route::get('/chargings',['as'=>'chargings.index','uses'=>'ChargingController@index']);
    Route::get('/chargings/history',['as'=>'chargings.history','uses'=>'ChargingController@history']);
    Route::get('/chargings/settings',['as'=>'chargings.settings','uses'=>'ChargingController@settings']);
    Route::get('/chargings/makecharge','ChargingController@makeCharge');
    Route::get('/chargings/listmtopup','MtopupController@index');
    Route::get('/chargings/maketopup','MtopupController@makeMtopup');
    Route::get('/chargings/cards','CardController@index');

    Route::get('/chargings/reset/{id}','ChargingController@resetCharging');

    Route::post('/chargings/update-fees','ChargingController@updateFees');

    Route::get('/chargings/telcos/create','ChargingController@createTelco');
    Route::post('/chargings/telcos/postcreate',['as'=>'chargings.telcopostcreate','uses'=>'ChargingController@postCreateTelco']);
    Route::get('/chargings/telcos/{id}/edit','ChargingController@editTelco');
    Route::patch('/chargings/telcos/{id}/update',['as'=>'chargings.telcopostupdate','uses'=>'ChargingController@postUpdateTelco']);
    Route::delete('/chargings/telcos/{id}','ChargingController@destroyTelco');



    //AJAX
    Route::get('/ajax/charging/{id}',['as'=>'ajax.charging','uses'=>'ChargingController@ajaxChargingMaster']);
    Route::post('/ajax/charging/{id}',['as'=>'ajax.charging.actions','uses'=>'ChargingController@ajaxChargingActions']);
});


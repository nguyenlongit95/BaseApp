<?php

$namespace = 'App\Modules\AutoCharging\Controllers';
$as = config('backend.backendRoute');

//--FRONTEND
Route::group(['middleware' => ['web'], 'module'=>'AutoCharging', 'namespace' => $namespace], function () {
    //Tay the nhanh
    Route::get('/doithenhanh.html',['as'=>'frontend.pages.taythenhanh', 'uses'=> 'AutoChargingFrontController@viewPageFrontCharging'] );
    Route::post('/doithenhanh.html', ['as'=>'frontend.charging.postAutoCharging', 'uses'=>'AutoChargingFrontController@insertCharging']);
});

/// API
Route::group(['middleware' => ['api'], 'module'=>'AutoCharging', 'namespace' => $namespace], function () {
    //Tay the nhanh
    Route::get('/autochargingws',['as'=>'frontend.api.autocharging', 'uses'=> 'AutoChargingApiController@blankPage'] );
    Route::get('/autochargingws/{trans_id}/{request_id}',['as'=>'frontend.api.charging.status', 'uses'=> 'AutoChargingApiController@getCheckStatus'] );
    Route::post('/autochargingws.html',['as'=>'frontend.api.autocharging', 'uses'=> 'AutoChargingApiController@postApiAutoCharging'] );

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

    // Route autochargins settings
    Route::get('/autochargins/setting',['as'=>'autochargins.setting.index','uses'=>'AutoChargingController@setting']);
    Route::get('/autochargins/setting/new',['as'=>'autochargins.setting.new','uses'=>'AutoChargingController@addNew']);
    Route::patch('/autochargins/setting/add',['as'=>'autochargins.setting.add','uses'=>'AutoChargingController@postAdd']);
    Route::get('/autochargins/setting/{id}',['as'=>'autochargins.setting.update','uses'=>'AutoChargingController@getEditSetting']);
    Route::patch('/autochargins/setting/update/{id}',['as'=>'autochargins.setting.update','uses'=>'AutoChargingController@postUpdateSetting']);


    //AJAX
    Route::get('/ajax/autocharging/{id}',['as'=>'ajax.autocharging','uses'=>'AutoChargingController@ajaxChargingMaster']);
    Route::post('/ajax/autocharging/{id}',['as'=>'ajax.autocharging.actions','uses'=>'AutoChargingController@ajaxChargingActions']);
});


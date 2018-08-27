<?php

$namespace = 'App\Modules\Api\Controllers';
$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Api', 'namespace' => $namespace], function () {
    //Tay the cham
    Route::get('/tester',['as'=>'api.tester', 'uses'=> 'ApiController@test'] );
});

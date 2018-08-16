<?php

$namespace = 'App\Modules\Order\Controllers';

$as = config('backend.backendRoute');

//Backend
Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Order', 'namespace' => $namespace], function () {
    Route::get('/orders','OrderController@index');
});
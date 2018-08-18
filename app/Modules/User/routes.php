<?php

$namespace = 'App\Modules\User\Controllers';

$as = config('backend.backendRoute');
////Backend
Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'User', 'namespace' => $namespace], function () {
    # User Modules
    Route::resource('users','UserController');
    Route::post('users/actions','UserController@actions');
});
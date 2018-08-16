<?php

$namespace = 'App\Modules\Setting\Controllers';
$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Setting', 'namespace' => $namespace], function () {
    
        # Setting Modules
    Route::get('settings/general','SettingController@general');
    Route::post('settings/general', 'SettingController@update_general');

});
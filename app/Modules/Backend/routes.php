<?php

$namespace = 'App\Modules\Backend\Controllers';

$as = config('backend.backendRoute');
Route::group(['middleware' => ['web'], 'module'=>'Backend', 'namespace' => $namespace], function () {
    Route::get('files/{hash}/{name}', 'UploadsController@get_file');
});

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Backend', 'namespace' => $namespace], function () {
    Route::post('/ajax', 'BackendController@ajaxActions');
    Route::get('/', 'BackendController@dashboard');
    
    # Role Modules
    Route::resource('roles','RoleController');
    Route::post('roles/actions','RoleController@actions');
    # Permission Modules
    Route::resource('permissions','PermissionController');
    Route::post('permissions/actions','PermissionController@actions');

});
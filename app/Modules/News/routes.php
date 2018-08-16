<?php

$namespace = 'App\Modules\News\Controllers';

$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'News', 'namespace' => $namespace], function () {
    Route::resource('news','NewsController');
    Route::post('news/actions','NewsController@actions');

});
<?php

$namespace = 'App\Modules\Tags\Controllers';

$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Tags', 'namespace' => $namespace], function () {
    Route::resource('tagslist','TagslistController');
    Route::post('tagslist/actions','TagslistController@actions');

    Route::resource('tagitems','TagitemsController');
    Route::post('tagitems/actions','TagitemsController@actions');
});
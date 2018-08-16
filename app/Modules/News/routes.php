<?php

$namespace = 'App\Modules\News\Controllers';

$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'News', 'namespace' => $namespace], function () {
    Route::resource('news','NewsController');
    Route::post('news/actions','NewsController@actions');

});

//Frontend
Route::group(['middleware' => ['web'], 'module'=>'News', 'namespace' => $namespace], function () {

    Route::get('tin-tuc', ['as'=>'frontend.news.index', 'uses'=>'NewsFrontController@index']);
    Route::get('tin-tuc/{url_key}', ['as'=>'frontend.news.view', 'uses'=>'NewsFrontController@renderViewPage']);
});
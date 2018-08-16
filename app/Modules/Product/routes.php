<?php

$namespace = 'App\Modules\Product\Controllers';
$as = config('backend.backendRoute');

Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Product', 'namespace' => $namespace], function () {
    
    Route::resource('/products','ProductController');
});
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Route test demo
 * */
Route::get('/', function () {
    return view('welcome');
});
Route::get('ListCategoryProducts','CategoryProductController@index');
Route::post('addNewCategoryProduct','CategoryProductController@store');

/*
 * Route cho phia admin
 * */
Route::group(['prefix'=>'admin'],function(){
    Route::get('DashBoard','adminController@index');
});

/*
 * Route cho phia client
 * */

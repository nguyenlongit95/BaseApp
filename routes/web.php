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
    Route::get('DashBoard','adminController@DashBoard');

    /*
     * Route CURD cho cac thành phần của hệ thống
     * Categories
     * Article
     * Product
     * Blog
     * Comments
     * Contacts
     * Linkeds
     * ...
     * */
    Route::group(['prefix'=>'Categories'],function(){
        Route::get('CategoriesBlog','CategoryBlogController@index');
        Route::get('addCategoriesBlog','CategoryBlogController@create');
        Route::get('updateCategoriesBlog/{id}','CategoryBlogController@show');
        Route::get('deleteCategoriesBlog/{id}','CategoryBlogController@destroy');

        Route::get('CategoriesProduct','CategoryProductController@index');
        Route::get('addCategoriesProduct','CategoryProductController@create');
        Route::get('updateCategoriesProduct/{id}','CategoryProductController@show');
        Route::get('deleteCategoriesProduct/{id}','CategoryProductController@destroy');
    });
});

/*
 * Route cho phia client
 * */

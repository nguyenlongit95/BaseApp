<?php
/*
 * Route test demo
 * */
Route::get('/', function () {
    return view('welcome');
});
/*
 * Route cho phia admin
 * */
Route::group(['prefix'=>'admin'],function(){
    // Trang DashBoard sẽ là nơi thống kê sản phẩm và các thông tin liên quan
    Route::get('DashBoard','adminController@DashBoard');

    /*
     * Route CURD cho cac thành phần của hệ thống
     * Categories
     * Article
     * Product
     * Blog
     * Comments
     * Contact
     * Linkeds
     * ...
     * */
    Route::group(['prefix'=>'Categories'],function(){
        Route::get('CategoriesBlog','CategoryBlogController@index');
        Route::get('addCategoriesBlog','CategoryBlogController@getStore');
        Route::post('addCategoriesBlog','CategoryBlogController@store');
        Route::get('updateCategoriesBlog/{id}','CategoryBlogController@getUpdate');
        Route::post('updateCategoriesBlog/{id}','CategoryProductController@update');
        Route::get('deleteCategoriesBlog/{id}','CategoryBlogController@destroy');

        Route::get('CategoriesProduct','CategoryProductController@index');
        Route::get('addCategoriesProduct','CategoryProductController@getStore');
        Route::post('addCategoriesProduct','CategoryProductController@store');
        Route::get('updateCategoriesProduct/{id}','CategoryProductController@getUpdate');
        Route::post('updateCategoriesProduct/{id}','CategoryProductController@update');
        Route::get('deleteCategoriesProduct/{id}','CategoryProductController@destroy');
    });

    Route::group(['prefix'=>'Product'],function(){
        Route::get('Products','ProductController@index');
        Route::get('addProducts','ProductController@getStore');
        Route::post('addProduct','ProductController@store');

        Route::get('updateProduct/{id}','ProductController@getUpdate');
        Route::post('updateProduct/{id}','ProductController@Update');

        Route::get('deleteProduct/{id}','ProductController@destroy');

        Route::post('addImage/{id}','ProductController@postAddImage');
        Route::get('deleteImage/{id}','ProductController@getDeleteImage');

    });

    Route::group(['prefix'=>'Ratting'],function(){
        Route::get('Rattings','RattingController@index');
        Route::get('updateRattings/{id}','RattingController@getUpdateRatting');
        Route::post('updateRattings/{id}','RattingController@update');
    });

    Route::group(['prefix'=>'Blog'],function(){
        Route::get('Blogs','BlogController@index');

        Route::get('addBlogs','BlogController@getAddBlogs');
        Route::post('addBlogs','BlogController@store');

        Route::get('updateBlog/{id}','BlogController@getUpdateBlogs');
        Route::post('updateBlogs/{id}','BlogController@update');

        Route::post('changeImageBlogs/{id}','BlogController@changeImage');

        Route::get('deleteBlog/{id}','BlogController@destroy');
    });

    Route::group(['prefix'=>'Order'],function(){
        Route::get('Orders','OrderCOntroller@index');

        Route::get('updateOrder/{id}','OrderController@getUpdateOrder');
        Route::post('updateOrder/{id}','OrderCOntroller@update');

        Route::get('addOrder','OrderController@getStore');
        Route::post('addOrder','OrderController@store');

        Route::get('deleteOrder/{id}','OrderController@destroy');

        Route::get('updateOrderDetails/{id}','OrderController@getUpdateOrderDetails');

        Route::post('updateOrderDetails/{id}','OrderController@postUpdateOrderDetails');

        Route::get('deleteOrderDetails/{id}','OrderController@deleteOrderDetails');
    });

    Route::group(['prefix'=>'User'],function(){
        Route::get('Users','UserController@index');

        Route::get('updateUser/{id}','UserController@getUpdate');
        Route::post('updateUser/{ud}','UserController@update');

        Route::get('deleteUser/{id}','UserController@destroy');
    });

    Route::group(['prefix'=>'Article'],function(){
        Route::get('Articles','ArticleController@index');
        Route::get('addArticle','ArticleController@getStore');
        Route::post('addArticle','ArticleController@store');

        Route::get('updateArticle/{id}','ArticleController@getUpdate');

        Route::get('deleteArticle/{id}','ArticleController@destroy');
        // Ajax Title
        Route::post('createSlug','ArticleController@postAjaxSlug');
    });

    /*
     * Route cho các thành phần con trong hệ thống
     * Comments
     * Contact
     * Info of page
     * Linkeds
     * Sliders
     * API
     * */
    Route::group(['prefix'=>'Comment'],function(){
        Route::get('Comments','CommentController@index');

        Route::get('Comments/{id}','CommentController@getDetails');
        Route::get('updateComment/{id}','CommentController@getUpdate');
        Route::post('updateComment/{id}','CommentController@update');
        //Route::post('updateComment/{id}','CommentController@updateState');

        Route::get('deleteComment/{id}','CommentController@destroy');

        Route::get('addComment/{id}','CommentController@getStore');
        Route::post('addComment','CommentController@store');
    });

    Route::group(['prefix'=>'Contact'],function(){
        Route::get('Contacts','ContactController@index');

        Route::post('ChangeStatus/{id}','ContactController@ajaxChangeContact');

        Route::get('deleteContact','ContactController@destroy');
    });

    /*
     * Route cho Widgets
     * Menu header
     * Menu footer
     * Sidebar
     * theme
     * */

    /*
     * Route cho Mailbox
     * Mail sends
     * Total email
     * Mail wait
     * */

    /*
     * Route cho documentation
     * */
});

/*
 * Route cho phia client
 * */

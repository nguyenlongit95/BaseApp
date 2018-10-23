<?php

namespace App\Providers;

use App\Repositories\Rattings\RattingsReporitoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Thêm các đường dẫn tới cho class của các Repository ở đây, ở đây là singleton để truy cập tại trang admin
        $this->app->singleton(
          \App\Repositories\CategoryProducts\CategoryProductReporitoryInterface::class,
          \App\Repositories\CategoryProducts\CateoryEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CategoryBlogs\CategoryBlogReporitoryInterface::class,
            \App\Repositories\CategoryBlogs\CateoryEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Products\ProductReporitoryInterface::class,
            \App\Repositories\Products\ProductEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ImageProduct\ImageProductReporitoryInterface::class,
            \App\Repositories\ImageProduct\ImageProductEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Blogs\BlogReporitoryInterface::class,
            \App\Repositories\Blogs\BlogEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Rattings\RattingsReporitoryInterface::class,
            \App\Repositories\Rattings\RattingsEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Orders\OrdersReporitoryInterface::class,
            \App\Repositories\Orders\OrdersEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Users\UsersReporitoryInterface::class,
            \App\Repositories\Users\UserEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\OrdersDetails\OrderDetilasReporitoryInterface::class,
            \App\Repositories\OrdersDetails\OrderDetailsEloquentRepository::class
        );
        $this->app->singleton(
          \App\Repositories\Comments\CommentReporitoryInterface::class,
          \App\Repositories\Comments\CommentEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contact\ContactReporitoryInterface::class,
            \App\Repositories\Contact\ContactEloquentRepository::class
        );
        $this->app->singleton(
                \App\Repositories\Articles\ArticleRepositoryInterface::class,
                \App\Repositories\Articles\ArticlesEloquentRepository::class
        );
    }
}

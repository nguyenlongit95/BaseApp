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
        $this->app->bind(
          \App\Repositories\CategoryProducts\CategoryProductReporitoryInterface::class,
          \App\Repositories\CategoryProducts\CateoryEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\CategoryBlogs\CategoryBlogReporitoryInterface::class,
            \App\Repositories\CategoryBlogs\CateoryEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Products\ProductReporitoryInterface::class,
            \App\Repositories\Products\ProductEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\ImageProduct\ImageProductReporitoryInterface::class,
            \App\Repositories\ImageProduct\ImageProductEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Blogs\BlogReporitoryInterface::class,
            \App\Repositories\Blogs\BlogEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Rattings\RattingsReporitoryInterface::class,
            \App\Repositories\Rattings\RattingsEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Orders\OrdersReporitoryInterface::class,
            \App\Repositories\Orders\OrdersEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Users\UsersReporitoryInterface::class,
            \App\Repositories\Users\UserEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\OrdersDetails\OrderDetilasReporitoryInterface::class,
            \App\Repositories\OrdersDetails\OrderDetailsEloquentRepository::class
        );
        $this->app->bind(
          \App\Repositories\Comments\CommentReporitoryInterface::class,
          \App\Repositories\Comments\CommentEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contact\ContactReporitoryInterface::class,
            \App\Repositories\Contact\ContactEloquentRepository::class
        );
        $this->app->bind(
                \App\Repositories\Articles\ArticleRepositoryInterface::class,
                \App\Repositories\Articles\ArticlesEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\InfoOfPage\InfoOfPageReporitoryInterface::class,
            \App\Repositories\InfoOfPage\InfoOfPageEloquentRepository::class
        );
        $this->app->bind(
          \App\Repositories\Linked\LinkedRepositoryInterface::class,
          \App\Repositories\Linked\LinkedEloquentRepository::class
        );
        $this->app->bind(
          \App\Repositories\Sliders\SliderReporitoryInterface::class,
          \App\Repositories\Sliders\SlidersEloquentRepository::class
        );
    }
}

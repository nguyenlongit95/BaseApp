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
        // Thêm các đường dẫn tới cho class của các Repository ở đây
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
    }
}

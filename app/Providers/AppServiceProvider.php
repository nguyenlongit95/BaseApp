<?php

namespace App\Providers;

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
    }
}

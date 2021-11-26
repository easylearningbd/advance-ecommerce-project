<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces as Interfaces;
use App\Repositories as Repositories;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Interfaces\Repositories\ReviewRepository::class,
            Repositories\ReviewRepositoryImpl::class
        );

        $this->app->bind(
            Interfaces\Repositories\SliderRepository::class,
            Repositories\SliderRepositoryImpl::class
        );

        $this->app->bind(
            Interfaces\Repositories\CategoryRepository::class,
            Repositories\CategoryRepositoryImpl::class
        );

        $this->app->bind(
            Interfaces\Repositories\ProductRepository::class,
            Repositories\ProductRepositoryImpl::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

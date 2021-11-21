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
            Repositories\ReviewRepositoryImp::class
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

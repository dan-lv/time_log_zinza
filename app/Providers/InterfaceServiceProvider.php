<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Interfaces\CheckInInterface', 'App\Repositories\CheckInRepository');

        $this->app->bind('App\Interfaces\CheckOutInterface', 'App\Repositories\CheckOutRepository');
    }
}

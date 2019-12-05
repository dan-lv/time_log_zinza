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
        $this->app->bind('App\Interfaces\TimeLogInterface', 'App\Repositories\TimeLogRepository');
        $this->app->bind('App\Interfaces\AbsentInterface', 'App\Repositories\AbsentRepository');
        $this->app->bind('App\Interfaces\UserInterface', 'App\Repositories\UserRepository');
    }
}

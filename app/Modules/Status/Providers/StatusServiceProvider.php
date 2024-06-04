<?php

namespace App\Modules\Status\Providers;

use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->loadMigrationsFrom(__DIR__.'/../Migrations');
       $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
       $this->loadViewsFrom(__DIR__.'/../resources/views/','StatusModule');
    }
}

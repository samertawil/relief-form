<?php
 

namespace App\Modules\Aid\Providers;

use Illuminate\Support\ServiceProvider;

class AidServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    
    public function boot()
    {
     $this->loadMigrationsFrom(__DIR__.'/../Migrations');
       $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views/','AidModule');

        $this->publishes([__DIR__.'/../public' => public_path('vendor/AidModule'),
     ], 'public');
 
    }
}

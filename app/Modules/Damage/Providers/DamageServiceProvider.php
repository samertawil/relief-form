<?php
 

namespace App\Modules\Damage\Providers;

use Illuminate\Support\ServiceProvider;

class DamageServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    
    public function boot()
    {
     $this->loadMigrationsFrom(__DIR__.'/../Migrations');
       $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views/','DamageModule');

        $this->publishes([__DIR__.'/../public' => public_path('vendor/DamageModule'),
     ], 'public');
 
    }
}

 
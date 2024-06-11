<?php
 

namespace App\Modules\Address\Providers;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    
    public function boot()
    {
       $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
       $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views/','AddressModule');

        $this->publishes([__DIR__.'/../public' => public_path('vendor/AddressModule'),
     ], 'public');
 
    }
}

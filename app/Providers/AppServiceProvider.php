<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
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
        // Blade::if('admin', function () {            
        //     if (auth()->user() && auth()->user()->roles == 'admin') {
        //         return 1;
        //     }
        //     return 0;
        // });
        // Blade::if('user', function () {            
        //     if (auth()->user() && auth()->user()->roles == 'user') {
        //         return 1;
        //     }
        //     return 0;
        // });
    }
}

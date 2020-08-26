<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //
        // here we are setting default parameters for routes. basically we're setting default route to Illuminate\Contracts\Routing\UrlGenerator class
        app('url')->defaults(['locale' => config('app.locale')]);
    }
}

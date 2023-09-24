<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AlphaVantagePricesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\AlphaVantagePrices',fn()=> new  \App\Services\AlphaVantagePrices());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

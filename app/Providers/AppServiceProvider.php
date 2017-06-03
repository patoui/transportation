<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('development', 'dusk', 'testing')) {
            $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
            $this->app->register(\PatOui\Scout\TestingScoutServiceProvider::class);
        }
    }
}

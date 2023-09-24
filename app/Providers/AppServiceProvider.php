<?php

namespace App\Providers;

use Core\Product\Infrastructure\Laravel\Config\LaravelProductServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        (new LaravelProductServiceProvider($this->app))->register();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

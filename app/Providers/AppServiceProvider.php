<?php

namespace App\Providers;

use Core\Main\Infrastructure\Laravel\Config\LaravelMainServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        (new LaravelMainServiceProvider($this->app))->register();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

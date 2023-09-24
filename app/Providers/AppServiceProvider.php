<?php

namespace App\Providers;

use Core\Product\Api\InternalProductApi;
use Core\Product\Api\ProductApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductApi::class, InternalProductApi::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

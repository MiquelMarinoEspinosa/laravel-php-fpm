<?php

namespace Core\Product\Infrastructure\Laravel\Config;

use Core\Product\Api\InternalProductApi;
use Core\Product\Api\ProductApi;
use Illuminate\Contracts\Foundation\Application;

final readonly class LaravelProductServiceProvider
{
    public function __construct(
        private Application $app
    ) {
    }

    public function register(): void
    {
        $this->app->bind(ProductApi::class, InternalProductApi::class);
    }
}

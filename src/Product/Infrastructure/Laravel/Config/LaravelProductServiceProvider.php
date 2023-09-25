<?php

namespace Core\Product\Infrastructure\Laravel\Config;

use Core\Product\Api\InternalProductApi;
use Core\Product\Api\ProductApi;
use Core\Shared\Application\CommandBus\CommandBus;
use Core\Shared\Infrastructure\CommandBus\CoreCommandBus;
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
        $this->app->bind(CommandBus::class, CoreCommandBus::class);
    }
}

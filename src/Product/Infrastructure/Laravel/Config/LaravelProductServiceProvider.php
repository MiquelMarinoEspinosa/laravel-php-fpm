<?php

declare(strict_types=1);

namespace Core\Product\Infrastructure\Laravel\Config;

use Core\Product\Api\InternalProductApi;
use Core\Product\Api\ProductApi;
use Core\Product\Application\CommandBus\CommandBus;
use Core\Product\Domain\Repository\ProductRepository;
use Core\Product\Infrastructure\CommandBus\CoreCommandBus;
use Core\Product\Infrastructure\Repository\EloquentProductRepository;
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
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
    }
}

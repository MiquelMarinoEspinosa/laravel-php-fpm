<?php

declare(strict_types=1);

namespace Core\Main\Infrastructure\Laravel\Config;

use Core\Product\Infrastructure\Laravel\Config\LaravelProductServiceProvider;
use Illuminate\Contracts\Foundation\Application;

final readonly class LaravelMainServiceProvider
{
    public function __construct(
        private Application $app
    ) {
    }

    public function register(): void
    {
        (new LaravelProductServiceProvider($this->app))->register();
    }
}

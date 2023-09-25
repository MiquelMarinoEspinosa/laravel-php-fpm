<?php

declare(strict_types=1);

namespace Core\Product\Api;

use Core\Product\Api\IO\Input\ProductInput;
use Core\Product\Application\Command\CreateProduct\CreateProductCommand;
use Core\Product\Application\CommandBus\CommandBus;

final readonly class InternalProductApi implements ProductApi
{
    public function __construct(
        private CommandBus $commandBus
    ) {
    }

    public function create(ProductInput $productInput): void
    {
        $command = new CreateProductCommand(
            $productInput->name(),
            $productInput->sku(),
            $productInput->description(),
            $productInput->price(),
            $productInput->quantity()
        );

        $this->commandBus->dispatch($command);
    }
}

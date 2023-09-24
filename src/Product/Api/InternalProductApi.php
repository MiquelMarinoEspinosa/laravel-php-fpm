<?php

namespace Core\Product\Api;

use Core\Product\Api\IO\Input\ProductInput;
use Core\Product\Application\Command\CreateProduct\CreateProductCommand;
use Core\Product\Application\Command\CreateProduct\CreateProductCommandHandler;

final readonly class InternalProductApi implements ProductApi
{
    public function __construct(
        private CreateProductCommandHandler $createProductCommandHandler
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

        ($this->createProductCommandHandler)($command);
    }
}

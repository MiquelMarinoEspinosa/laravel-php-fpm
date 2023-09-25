<?php

namespace Core\Product\Application\Command\CreateProduct;

use Core\Product\Application\Command\Command;
use Core\Product\Application\Command\CommandHandler;
use Core\Product\Domain\Entity\Product;
use Core\Product\Domain\Repository\ProductRepository;

final readonly class CreateProductCommandHandler implements CommandHandler
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    /**
     * @param CreateProductCommand $command
     */
    public function __invoke(Command $command): void
    {
        $product = new Product(
            null,
            $command->name(),
            $command->sku(),
            $command->description(),
            $command->price(),
            $command->quantity()
        );

        $this->productRepository->persist($product);
    }
}

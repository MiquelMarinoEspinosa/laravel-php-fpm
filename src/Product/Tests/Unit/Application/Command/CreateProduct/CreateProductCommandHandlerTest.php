<?php

declare(strict_types=1);

namespace Core\Product\Tests\Unit\Application\Command\CreateProduct;

use Core\Product\Application\Command\CreateProduct\CreateProductCommand;
use Core\Product\Application\Command\CreateProduct\CreateProductCommandHandler;
use Core\Product\Domain\Entity\Product;
use Core\Product\Domain\Repository\ProductRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class CreateProductCommandHandlerTest extends TestCase
{
    private MockObject | ProductRepository $productRepository;
    private CreateProductCommandHandler $createProductCommandHandler;

    protected function setUp(): void
    {
        $this->productRepository = self::createMock(ProductRepository::class);
        $this->createProductCommandHandler = new CreateProductCommandHandler(
            $this->productRepository
        );
    }

    public function testShouldPersistTheProduct(): void
    {
        $command = $this->givenCommand();
        $this->shouldPersistTheProduct($command);
        $this->whenHandlerIsInvoked($command);
    }

    private function givenCommand(): CreateProductCommand
    {
        return new CreateProductCommand(
            'Test product',
            'UDA-P-10',
            'great product',
            222.0,
            3
        );
    }

    private function shouldPersistTheProduct(CreateProductCommand $command): void
    {
        $product = new Product(
            null,
            $command->name(),
            $command->sku(),
            $command->description(),
            $command->price(),
            $command->quantity()
        );

        $this->productRepository
            ->expects(self::once())
            ->method('persist')
            ->with($product);
    }

    private function whenHandlerIsInvoked(CreateProductCommand $command): void
    {
        ($this->createProductCommandHandler)($command);
    }
}

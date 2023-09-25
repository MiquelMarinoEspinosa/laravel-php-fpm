<?php

namespace Core\Product\Application\Command\CreateProduct;

use Core\Shared\Application\Command\Command;

final readonly class CreateProductCommand implements Command
{
    public function __construct(
        private string $name,
        private string $sku,
        private string $description,
        private float $price,
        private int $quantity
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }
}
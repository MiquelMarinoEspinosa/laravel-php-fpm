<?php

declare(strict_types=1);

namespace Core\Product\Domain\Entity;

final readonly class Product
{
    public function __construct(
        private ?int $id,
        private string $name,
        private string $sku,
        private string $description,
        private float $price,
        private int $quantity
    )
    {

    }

    public function id(): ?int
    {
        return $this->id;
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

<?php

namespace Core\Product\Infrastructure\Repository;

use App\Models\Product as EloquentProduct;
use Core\Product\Domain\Entity\Product;
use Core\Product\Domain\Repository\ProductRepository;

final readonly class EloquentProductRepository implements ProductRepository
{
    public function persist(Product $product): void 
    {
        EloquentProduct::create(
            [
                'name' => $product->name(),
                'sku' => $product->sku(),
                'description' => $product->description(),
                'price' => $product->price(),
                'quantity' => $product->quantity()
            ]
        );
    }
}
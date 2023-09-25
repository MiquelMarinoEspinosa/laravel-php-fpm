<?php

declare(strict_types=1);

namespace Core\Product\Domain\Repository;

use Core\Product\Domain\Entity\Product;

interface ProductRepository
{
    public function persist(Product $product): void;
}

<?php

declare(strict_types=1);

namespace Core\Product\Api;

use Core\Product\Api\IO\Input\ProductInput;

interface ProductApi
{
    public function create(ProductInput $productInput): void;
}

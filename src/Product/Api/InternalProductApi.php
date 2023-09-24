<?php

namespace Core\Product\Api;

use Core\Product\Api\IO\Input\ProductInput;

final readonly class InternalProductApi implements ProductApi
{
    public function create(ProductInput $productInput): void
    {
        dd($productInput);
    }
}

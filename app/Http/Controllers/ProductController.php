<?php

namespace App\Http\Controllers;

use Core\Product\Api\IO\Input\ProductInput;
use Core\Product\Api\ProductApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductApi $productApi
    ) {
    }

    public function store(Request $request): Response
    {
        $this->productApi->create(
            $this->buildProductInput($request)
        );

        return new Response('', Response::HTTP_CREATED);
    }

    private function buildProductInput(Request $request): ProductInput
    {
        return new ProductInput(
            null,
            $request->name,
            $request->sku,
            $request->description,
            $request->price,
            $request->quantity
        );
    }
}

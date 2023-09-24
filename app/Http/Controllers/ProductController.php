<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        Product::create($request->all());
        $this->productApi->create();

        return new Response('', Response::HTTP_CREATED);
    }
}

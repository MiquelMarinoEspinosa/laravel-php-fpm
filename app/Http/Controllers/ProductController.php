<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Core\Product\UserInterface\Controller\ProductController as CoreProductController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private CoreProductController $coreProductController
    ) {
    }

    public function store(Request $request): Response
    {
        Product::create($request->all());
        $this->coreProductController->create();

        return new Response('', Response::HTTP_CREATED);
    }
}

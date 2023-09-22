<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function store(Request $request): Response
    {
        Product::create($request->all());

        return new Response('', Response::HTTP_CREATED);
    }
}

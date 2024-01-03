<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::with('productAsset')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Showing all Products',
            'data' => ProductResource::collection($products),
        ]);
    }

    public function productsSorted()
    {
        $products = Product::with('productAsset')->orderByDesc('price')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Showing all products by the highest prices',
            'data' => ProductResource::collection($products),
        ]);
    }
}

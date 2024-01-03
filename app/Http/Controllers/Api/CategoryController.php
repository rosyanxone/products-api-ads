<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::latest()->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Showing all Categories',
            'data' => CategoryResource::collection($categories),
        ]);
    }

    public function categoriesSorted()
    {
        $categories = Category::with('product')->get()->sortByDesc(function($q) {
            return $q->product->count();
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Showing all Categories by product amount',
            'data' => CategoryResource::collection($categories),
        ]);
    }
}

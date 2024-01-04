<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Product;
use App\Models\ProductAsset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

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

    public function store(ProductRequest $request)
    {
        $productValidate = Validator::make($request->all(), $request->rules());

        if (!$productValidate->fails()) {
            try {
                DB::beginTransaction();
                $product = Product::create([
                    ...$request->all(),
                    "slug" => Str::slug(
                        $request->name,
                        '-',
                        'en',
                        [
                            '/' => '-',
                            '.' => '-'
                        ]
                    )
                ]);
                foreach ($request->all()['images'] as $productAsset) {
                    ProductAsset::create([
                        "product_id" => $product->id,
                        "image" => $productAsset
                    ]);
                }
                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Product created successfully',
                    'data' => new ProductResource($product),
                ], 201);
            } catch (Exception $e) {
                DB::rollBack();

                return response()->json([
                    'status' => 'fail',
                    'message' => $e,
                    'data' => null,
                ]);
            }
        }
    }

    public function update(ProductRequest $request, Product $product)
    {
        $productValidate = Validator::make($request->all(), $request->rules());

        if (!$productValidate->fails()) {
            $product->update([
                ...$request->all(),
                "slug" => Str::slug(
                    $request->name,
                    '-',
                    'en',
                    [
                        '/' => '-',
                        '.' => '-'
                    ]
                )
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully',
                'data' => new ProductResource($product),
            ], 202);
        }
    }

    public function destroy(Product $product) {
        $product->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'data' => null,
        ]);
    }
}

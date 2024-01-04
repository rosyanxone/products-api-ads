<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductAsset;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAssetResource;
use App\Http\Requests\ProductAssetRequest;

class ProductAssetController extends Controller
{
    public function store(ProductAssetRequest $request)
    {
        $productValidate = Validator::make($request->all(), $request->rules());

        if (!$productValidate->fails()) {
            $productAsset = ProductAsset::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Product Asset created successfully',
                'data' => new ProductAssetResource($productAsset),
            ], 201);
        }
    }
    
    public function destroy(ProductAsset $productAsset) {
        $productAsset->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Product Asset deleted successfully',
            'data' => null,
        ]);
    }
}

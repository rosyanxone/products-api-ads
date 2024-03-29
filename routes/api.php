<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductAssetController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'categories');
        Route::get('/categories/ascending', 'categoriesAscending');
        Route::get('/categories/descending', 'categoriesDescending');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'products');
        Route::get('/products/sorted', 'sortedProducts');
        Route::post('/product/store', 'store');
        Route::post('/product/update/{product}', 'update');
        Route::delete('/product/destroy/{product}', 'destroy');
    });

    Route::controller(ProductAssetController::class)->group(function () {
        Route::post('/product-asset/store', 'store');
        Route::delete('/product-asset/destroy/{productAsset}', 'destroy');
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

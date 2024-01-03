<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
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

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'categories');
    Route::get('/categories/sorted', 'categoriesSorted');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'products');
    Route::get('/products/sorted', 'productsSorted');
});

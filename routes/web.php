<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware('auth:sanctum')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/categories/{sorted}', 'sortedCategories')->name('categories.sorted');
    Route::get('/products', 'products')->name('products');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function categories()
    {
        $request = Request::create('/api/categories', 'GET');
        $response = Route::dispatch($request);

        $body = json_decode($response->getContent(), true);
        $categories = $body['data'];

        return view('pages.categories', compact('categories'));
    }

    public function sortedCategories($sorted)
    {
        $request = Request::create('/api/categories/descending', 'GET');

        if($sorted == 'ascending') {
            $request = Request::create('/api/categories/ascending', 'GET');
        }

        $response = Route::dispatch($request);
        
        $body = json_decode($response->getContent(), true);
        $categories = $body['data'];

        return view('pages.categories', compact('categories'));
    }

    public function products()
    {
        $request = Request::create('/api/products/sorted', 'GET');
        $response = Route::dispatch($request);

        $body = json_decode($response->getContent(), true);
        $products = $body['data'];

        return view('pages.products', compact('products'));
    }

    public function productAssets()
    {
        return view('pages.product-assets');
    }
}

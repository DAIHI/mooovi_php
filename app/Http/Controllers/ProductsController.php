<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends RankingController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', ['only' => 'search']);
    }

    public function index()
    {
        $products = Product::paginate(20);
        return view('products.index')->with('products', $products);
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return view('products.show')->with('product', $product);
    }

    public function search(Request $request)
    {
        $products = Product::where('title', 'LIKE', "%{$request->keyword}%")->take(20)->get();
        return view('products.search')->with('products', $products);
    }
}

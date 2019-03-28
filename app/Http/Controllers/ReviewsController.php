<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Auth;

class ReviewsController extends RankingController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', ['only' => 'create']);
    }

    public function create($product_id)
    {
        $product = Product::find($product_id);
        return view('reviews.create')->with('product', $product);
    }

    public function store(Request $request, $product_id)
    {
        Review::create([
          'user_id' => Auth::user()->id,
          'rate' => $request->rate,
          'review' => $request->review,
          'product_id' => $product_id,
        ]);

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Review;

class ReviewsController extends RankingController
{
    public function create($product_id)
    {
        $product = Product::find($product_id);
        $review = new Review();
        return view('reviews.create')->with(['product' => $product, 'review' => $review]);
    }

    public function store(Request $request, $product_id)
    {
        Review::create([
          'nickname' => $request->nickname,
          'rate' => $request->rate,
          'review' => $request->review,
          'product_id' => $product_id,
        ]);
        return redirect('/');
    }
}

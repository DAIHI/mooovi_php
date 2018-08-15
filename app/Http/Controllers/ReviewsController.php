<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Review;

class ReviewsController extends Controller
{
    public function create($product_id)
    {
        $product = Product::find($product_id);
        $review = new Review();
        return view('reviews.create')->with(['product' => $product, 'review' => $review]);
    }

    public function store()
    {
        return redirect('/products');
    }
}

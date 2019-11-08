<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::with(['product','customer'])->paginate(16);
        return view('admin.reviews.reviews')->with([
            'reviews'=>$reviews
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(16);
        $currencyCode = env("CURRENCY_CODE","$");
        return view('admin.products.products')->with([
            'products'=>$products,
            'currency_code'=>$currencyCode
        ]);
    }
}

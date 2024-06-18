<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('welcome', [
            'products' => Product::orderBy('created_at', 'desc')->limit(12)->get()
        ]);
    }

    public function show(Product $product){
        return view('products.show', [
            'product' => $product
        ]);
    }
}

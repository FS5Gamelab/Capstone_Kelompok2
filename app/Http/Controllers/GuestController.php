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
        $categoryId = $product->category_id;
        $relations = Product::where('category_id', $categoryId)->where('id', '!=', $product->id)->limit(20)->get();
        return view('products.show', [
            'product' => $product,
            'relations' => $relations
        ]);
    }
}

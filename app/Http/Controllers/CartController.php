<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        return view('user.cart', [
            'carts' => Carts::where('user_id', Auth::user()->id)->get(),
            'total' => 0
        ]);
    }

    public function update(Request $request, Product $product){
        $validate = $request->validate([
            'amount' => 'required|integer|min:1'
        ]);

        $validate['user_id'] = Auth::user()->id;
        $validate['product_id'] = $product->id;

        Carts::create($validate);
        
        return redirect()->back();
    }
}

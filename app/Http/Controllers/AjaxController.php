<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(Request $request){

        $data = [
            'product' => Product::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get(),
            'brand' => Brand::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get(),
            'category' => Category::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get(),
            'subCategory' => SubCategory::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get()
        ];

        return $data[$request->dataRequest];
    }
}

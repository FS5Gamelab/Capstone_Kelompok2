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
        if($request->dataRequest === 'product'){
            $data = Product::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get();
        }
        if($request->dataRequest === 'brand'){
            $data = Brand::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get();
        }
        if($request->dataRequest === 'category'){
            $data = Category::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get();
        }
        if($request->dataRequest === 'subCategory'){
            $data = SubCategory::where('name', 'like', $request->target . '%')->limit(10)->select('code','name')->get();
        }
        return $data;
    }
}

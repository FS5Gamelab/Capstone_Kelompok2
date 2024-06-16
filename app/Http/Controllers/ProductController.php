<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Discount;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        return view('dashboard.products.index', [
            'title' => 'Product', 'data' => $products, 'subcategories' => $subcategories, 'brands' => $brands, 'discounts' => $discounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        return view('dashboard.products.create', [
            'title' => 'Create Product',
            'subcategories' => $subcategories,
            'brands' => $brands,
            'discounts' => $discounts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->validated());
        $code = 'PDR' . Str::random(6);
        $validateData = $request->validated();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'.'. uniqid() .'.'. $image->getClientOriginalExtension();
            $image->storeAs('public/Products/', $imageName);
            $validateData['image'] = $imageName;
        } else {
            $validateData['image'] = null;
        }
        $validateData['code'] = $code;
        Product::create($validateData);
        return redirect()->route('products.index')->with(
            'response',[
                'type' => 'success',  
                'message' => 'Product created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($products->id);
        // $products = Product::findOrFail($product->id);
        return view('dashboard.products.show', [
            'title' => 'Show Product',
            'data' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        // $products = Product::find($product->id);
        return view('dashboard.products.__edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'subcategories' => $subcategories,
            'brands' => $brands,
            'discounts' => $discounts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->validated());
        $validateData = $request->validated();
        // $product = Product::find($product->id);
        if($request->hasFile('image')) {
            $oldImage = $product->image;
            Storage::delete('public/Products/'.$oldImage);
            $image = $request->file('image');
            $imageName = time() .'.'. uniqid() .'.'. $image->getClientOriginalExtension();
            $image->storeAs('public/Products/', $imageName);
            $validateData['image'] = $imageName;
        } else {
            $validateData['image'] = $product->image;
        }
        $product->update($validateData);
        return redirect()->route('products.index')->with(
            'response',[
                'status' => 'success',  
                'messages' => 'Product updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // $product = Product::find($product->id);
        $oldImage = $product->image;
        Storage::delete('public/Products/'.$oldImage);
        $product->delete();
        return redirect()->route('products.index')->with(
            'response',[
                'status' => 'success',  
                'messages' => 'Product deleted successfully'
            ]);
    }
}

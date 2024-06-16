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
    $validatedData = $request->validated();

    $size = json_encode([
        'width' => $request->width,
        'height' => $request->height,
        'weight' => $request->weight,
        'length' => $request->length
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/Products/', $imageName);
        $validatedData['image'] = $imageName;
    } else {
        $validatedData['image'] = null;
    }

    $validatedData['size'] = $size;
    $validatedData['code'] = 'PDR' . Str::random(6);

    Product::create($validatedData);

    return redirect()->route('items.index')->with(
        'response', [
            'type' => 'success',
            'message' => 'Product created successfully'
        ]
    );
}


    /**
     * Display the specified resource.
     */
    public function show(Product $item)
    {
        // dd($products->id);
        // $products = Product::findOrFail($product->id);
        $size = json_decode($item->size, true);
        return view('dashboard.products.show', [
            'title' => 'Show Product',
            'data' => $item,
            'size' => $size
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $item)
    {
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        $size = json_decode($item->size, true);
        // $products = Product::find($product->id);
        return view('dashboard.products.__edit', [
            'title' => 'Edit Product',
            'product' => $item,
            'size' => $size,
            'subcategories' => $subcategories,
            'brands' => $brands,
            'discounts' => $discounts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $item)
    {
        // dd($request->validated());
        $validateData = $request->validated();

        $size = json_encode([
            'width' => $request->width,
            'height' => $request->height,
            'weight' => $request->weight,
            'length' => $request->length
        ]);
        
        if($request->hasFile('image')) {
            $oldImage = $item->image;
            Storage::delete('public/Products/'.$oldImage);
            $image = $request->file('image');
            $imageName = time() .'.'. uniqid() .'.'. $image->getClientOriginalExtension();
            $image->storeAs('public/Products/', $imageName);
            $validateData['image'] = $imageName;
        } else {
            $validateData['image'] = $item->image;
        }

        $validateData['size'] = $size;

        $item->update($validateData);
        return redirect()->route('items.index')->with(
            'response',[
                'type' => 'success',  
                'message' => 'Product updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $item)
    {
        // $product = Product::find($product->id);
        $oldImage = $item->image;
        Storage::delete('public/Products/'.$oldImage);
        $item->delete();
        return redirect()->route('products.index')->with(
            'response',[
                'status' => 'success',  
                'messages' => 'Product deleted successfully'
            ]);
    }
}

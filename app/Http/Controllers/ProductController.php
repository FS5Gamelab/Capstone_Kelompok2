<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Discount;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

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
        return view('dashboard.products.index', [
            'title' => 'Product',
            'data' => $products,
            'subcategories' => $subcategories,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        if(count(Brand::all()) < 1){
            return redirect()->route('brands.create')->with(
                'response', [
                    'type' => 'warning',
                    'message' => 'Please add at least 1 brand before adding a new product.'
                ]
                );
        }

        if(count(SubCategory::all()) < 1){
            if(count(Category::all())){
                return redirect()->route('sub-categories.create')->with(
                    'response', [
                        'type' => 'warning',
                        'message' => 'Please add at least 1 sub-category before adding a new product.'
                    ]
                    );
            } else{
                return redirect()->route('categories.create')->with(
                    'response', [
                        'type' => 'warning',
                        'message' => 'Please add at least 1 category before adding a new product.'
                    ]
                    );
            }
        }

        return view('dashboard.products.create', [
            'title' => 'Create Product',
            'categories' => SubCategory::select('code','name')->limit(10)->get(),
            'brands' => Brand::select('code','name')->limit(10)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
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
        $validatedData['code'] = 'PCT' . Carbon::now()->format('YmdHis') . mt_rand(100000, 999999);
        $validatedData['brand_id'] = Brand::where('code', $validatedData['brand_id'])->first()->id;
        $validatedData['category_id'] = SubCategory::where('code', $validatedData['sub_category_id'])->first()->id;
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
        return view('dashboard.products.edit', [
            'title' => 'Edit Product',
            'data' => $item,
            'size' => json_decode($item->size, true),
            'categories' => Category::with('subCategories')->orderBy('id', 'desc')->get(),
            'brands' => Brand::all(),
            'discounts' => Discount::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $item)
    {
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
        $validateData['brand_id'] = Brand::where('code', $validateData['brand_id'])->first()->id;
        $validateData['category_id'] = SubCategory::where('code', $validateData['sub_category_id'])->first()->id;

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
        return redirect()->route('items.index')->with(
            'response',[
                'type' => 'success',  
                'message' => 'Product deleted successfully'
            ]);
    }
}

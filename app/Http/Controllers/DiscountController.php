<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discount = Discount::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.discounts.index', [
            'title' => 'Discounts', 'data' => $discount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.discounts.create', [
            'title' => 'Create Discount',
            'data' => Product::select('code','name')->limit(10)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request)
    {
        $validateData = $request->validated();
        
        if($request->applied_to == "product"){
            $validateData['product_id'] = Product::where('code', $request->referenceCode)->first()->id;
        } else if($request->applied_to == "category"){
            $validateData['category_id'] = Category::where('code', $request->referenceCode)->first()->id;
        } else if($request->applied_to == "subCategory"){
            $validateData['sub_category_id'] = SubCategory::where('code', $request->referenceCode)->first()->id;
        } else if($request->applied_to == "brand"){
            $validateData['brand_id'] = Brand::where('code', $request->referenceCode)->first()->id;
        }

        $validateData['details'] = json_encode([
            'periode' => [
                'start' => $request->started_at,
                'end' => $request->expired_at
            ]
        ]);

        // dd($validateData['value']);

        Discount::create($validateData);
        return redirect()->route('discounts.index')->with(
            'response', [
                'type' => "success", 
                'message' => "Discount created successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        $discount = Discount::find($discount->id);
        return view('dashboard.discounts.show', [
            'title' => 'Detail Discount', 
            'discount' => $discount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        $discount = Discount::find($discount->id);
        if(!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }
        return view('dashboard.discounts.edit', [
            'title' => 'Edit Discount', 
            'discount' => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount = Discount::find($discount->id);
        $validateData = $request->validated();
        $discount->update($validateData);
        return redirect('dashboard.discounts.index')->with(
            'response', [
                'status' => "success", 
                'messages' => "Discount updated successfully!"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect('dashboard.discounts.index')->with(
            'response', [
                'status' => "success", 
                'messages' => "Discount deleted successfully!"
            ]);
    }
}

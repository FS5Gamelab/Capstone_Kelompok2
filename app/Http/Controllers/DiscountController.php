<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\SubCategory;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discount = Discount::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.discounts.index', [
            'title' => 'Discounts',
            'data' => $discount
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

        $validateData['code'] = 'DCT'.Carbon::now()->format('YmdHis') . mt_rand(100000, 999999);

        $reference = [
            'product' =>  $request->has('product_id') ? Product::where('code', $validateData['product_id'])->first()->id : '',
            'sub_category' => $request->has('sub_category_id') ? SubCategory::where('code', $validateData['sub_category_id'])->first()->id : '',
            'category' => $request->has('category_id') ? Category::where('code', $validateData['category_id'])->first()->id : '',
            'brand' => $request->has('brand_id') ? Brand::where('code', $validateData['brand_id'])->first()->id : ''
        ];

        $validateData['reference_id'] = $reference[$validateData['applied_to']];
        $validateData['details'] = json_encode([
            'periode' => [
                'start' => $request->started_at,
                'end' => $request->expired_at
            ]
        ]);

        unset($validateData[$validateData['applied_to'].'_id']);
        
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
            'data' => $discount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', [
            'title' => 'Edit Discount', 
            'data' => $discount,
            'details' => json_decode($discount->details, true),
            'products' => Product::select('code','name')->limit(10)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $validateData = $request->validated();

        $reference = [
            'product' =>  $request->has('product_id') ? Product::where('code', $validateData['product_id'])->first()->id : '',
            'sub_category' => $request->has('sub_category_id') ? SubCategory::where('code', $validateData['sub_category_id'])->first()->id : '',
            'category' => $request->has('category_id') ? Category::where('code', $validateData['category_id'])->first()->id : '',
            'brand' => $request->has('brand_id') ? Brand::where('code', $validateData['brand_id'])->first()->id : ''
        ];

        $validateData['reference_id'] = $reference[$validateData['applied_to']];
        $validateData['details'] = json_encode([
            'periode' => [
                'start' => $request->started_at,
                'end' => $request->expired_at
            ]
        ]);
        $discount->update($validateData);
        return redirect()->route('discounts.index')->with(
            'response', [
                'type' => "success", 
                'message' => "Discount created successfully!"
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

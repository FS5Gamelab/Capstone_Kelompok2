<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.brand.index',[
            "title" => "Brand", 
            "data" => $brand
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brand.create', [
            "title" => "New Brand",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        // dd($request->validated());
        $validateData = $request->validated();
        $code = Carbon::now()->format('YmdHis') . mt_rand(100000, 999999);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'.'. uniqid() .'.'. $image->getClientOriginalExtension();
            $image->storeAs('public/Brands/', $imageName);
            $validateData['image'] = $imageName;
        } else {
            $validateData['image'] = null;
        }

        $validateData['code'] = $code;

        Brand::create($validateData);
        
        return redirect()->route('brands.index')->with(
            'response', [
                'type' => 'success', 
                'message' => 'Brand created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        // $brands = Brand::find($brand->id);
        return view('dashboard.brand.show', [
            "title" => "Detail Brand", 
            "data" => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        // $brands = Brand::find($brand->id);
        return view('dashboard.brand.edit', [
            "title" => "Edit Brand",
            "brand" => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        // dd($request->validated());
        // $brand = Brand::find($brand->id);
        $validateData = $request->validated();

        $validateData['updated_at'] = Carbon::now();

        if($request->hasFile('image')) {
            $oldImage = Brand::find($brand->id)->image;
            Storage::delete('public/Brands/'.$oldImage);
            $image = $request->file('image');
            $imageName = time().'.'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/Brands/', $imageName);
            $validateData['image'] = $imageName;
        } else {
            $validateData['image'] = $brand->image;
        }
        
        $brand->update($validateData);
        return redirect()->route('brands.index')->with(
            'response',[
                'type' => 'success', 
                'message' => 'Brand updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if($brand->image) {
            Storage::delete('public/Brands/'.$brand->image);
        }    
        $brand->delete();
        return redirect()->route('brands.index')->with(
            'response',[
                'type' => 'success', 
                'message' => 'Brand deleted successfully'
            ]);
    }
}

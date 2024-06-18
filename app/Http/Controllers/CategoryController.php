<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\SubCategory;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.category.index', [
            'title' => 'Category', 
            'data' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create', [
            'title' => 'New Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $code = "CRY".Carbon::now()->format('YmdHis') . mt_rand(100000, 999999);

        Category::create([
            'name' => $request->name,
            'code' => $code,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with(
            'response', [
                'type' => "success", 
                'message' => "Category created successfully!"
            ]);
    }

    /**
     * Display the specified resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', [
            'title' => 'Sub-category on ' . $category->name,
            'category' => $category,
            'data' => SubCategory::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(20)
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id);
        return view('dashboard.category.edit', [
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
{
    // dd($request->all());
    $code = Carbon::now()->format('YmdHis') . mt_rand(100000, 999999);
    $category = Category::find($id);
    $category->update([
        'name' => $request->name,
        'code' => $code,
        'description' => $request->description
    ]);

    return redirect()->route('categories.index')->with(
        'response', [
            'type' => 'success', 
            'message' => 'Category updated successfully'
        ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with(
            'response', [
                'type' => 'success', 
                'message' => $category->name . ' deleted successfully'
            ]);
    }
}

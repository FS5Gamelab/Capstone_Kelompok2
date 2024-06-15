<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::middleware('auth')->group(function () {  
    Route::resource('dashboard/categories', CategoryController::class);
    Route::resource('dashboard/products', ProductController::class);
    Route::resource('dashboard/discounts', DiscountController::class);
    Route::resource('dashboard/subcategory', SubCategoryController::class);
    Route::resource('dashboard/brands', BrandController::class);
    Route::resource('dashboard/orders', OrderController::class);
    Route::resource('dashboard/shipments', ShipmentController::class);
    Route::resource('dashboard/users', UserController::class);
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\AjaxController;
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

    // Dashboard
    Route::prefix('dashboard')->group(function(){

        // Product Contents
        Route::prefix('products')->group(function(){
            Route::get('/', function() {
                return redirect('/dashboard/products/items');
            });

            Route::resource('categories', CategoryController::class);
            Route::resource('sub-categories', SubCategoryController::class);
            Route::resource('discounts', DiscountController::class);
            Route::resource('items', ProductController::class);
            Route::resource('brands', BrandController::class);

            Route::post('data', [AjaxController::class, 'index'])->name('data.index');
        });

        Route::resource('orders', OrderController::class);
        Route::resource('shipments', ShipmentController::class);
        Route::resource('users', UserController::class);
    });
});

// route for show.blade.php
Route::get('show', function () {
    return view('products.show');
})->name('show');

Route::get('index', function () {
    return view('index');
})->name('index');

require __DIR__.'/auth.php';

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
        });


        Route::resource('orders', OrderController::class);
        Route::resource('shipments', ShipmentController::class);
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';
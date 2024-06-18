<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('index');
Route::get('product/{product:code}', [GuestController::class, 'show'])->name('product.show');
Route::prefix('user')->group(function(){

    Route::get('cart', [CartController::class, 'index'])->name('user.cart');
});

Route::post('product/{product:code}', [CartController::class, 'update'])->middleware('auth');

Route::middleware(['auth','authorization'])->group(function () {

    // Dashboard
    Route::prefix('dashboard')->group(function(){
        Route::get('/', function(){
            return view('dashboard.index',[
                'title' => 'Dashboard'
            ]);
        });
        
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

Route::get('checkout', function () {
    return view('user.checkout');
})->name('checkout');

Route::get('invoice', function () {
    return view('user.invoice');
})->name('invoice');

Route::get('tracking', function () {
    return view('public.tracking');
})->name('tracking');

Route::get('profile', function () {
    return view('user.profile');
})->name('profile');

require __DIR__.'/auth.php';

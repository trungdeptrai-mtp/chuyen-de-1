<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// TRANG CHỦ
Route::get('/', [ProductController::class, 'index'])->name('home');

// CHI TIẾT SẢN PHẨM
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// GIỎ HÀNG
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart']);
Route::get('/buy-now/{id}', [ProductController::class, 'buyNow']);
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

// TĂNG / GIẢM / XOÁ
Route::get('/increase/{id}', [ProductController::class, 'increase']);
Route::get('/decrease/{id}', [ProductController::class, 'decrease']);
Route::get('/remove/{id}', [ProductController::class, 'remove']);
Route::get('/clear-cart', [ProductController::class, 'clear'])->name('cart.clear');

// 🔥 CHECKOUT + ORDER
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/place-order', [ProductController::class, 'placeOrder'])->name('place.order');
Route::get('/order-success', [ProductController::class, 'orderSuccess'])->name('order.success');
Route::get('/orders', [ProductController::class, 'orders'])->name('orders');

// SEARCH
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

// LOGIN / REGISTER
require __DIR__.'/auth.php';
Route::get('/category/{type}', [ProductController::class, 'category']);
Route::get('/brand/{brand}', [ProductController::class, 'brand']);
Route::get('/setup', [ProductController::class, 'setup']);
require __DIR__.'/auth.php';
Route::get('/add-product', function () {
    return view('add_product');
});

Route::post('/add-product', [ProductController::class, 'store']);
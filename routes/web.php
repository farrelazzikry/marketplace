<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// USER
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\ProductController as UserProduct;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController as UserOrder;

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\PaymentController;

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// ROUTE AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE USER
Route::prefix('user')->name('user.')->group(function () {

    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');

    // Route Produk
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [UserProduct::class, 'index'])->name('index');
        Route::get('/{id}', [UserProduct::class, 'show'])->name('show');
    });

    // Route Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    // Route Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    // Route Pemesanan
    Route::get('/orders', [UserOrder::class, 'index'])->name('orders');
});
// ROUTE ADMIN
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    // Route Produk
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [AdminProduct::class, 'index'])->name('index');
        Route::get('/create', [AdminProduct::class, 'create'])->name('create');
        Route::post('/store', [AdminProduct::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminProduct::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [AdminProduct::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AdminProduct::class, 'destroy'])->name('destroy');
    });

    // Route Pemesanan
    // Route Pemesanan
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [AdminOrder::class, 'index'])->name('index');
        Route::post('/{id}/update-status', [AdminOrder::class, 'updateStatus'])->name('updateStatus');
    });

    // Route Payment
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('/payments/verify/{id}', [PaymentController::class, 'verify'])->name('payments.verify');
    Route::get('/payments/reject/{id}', [PaymentController::class, 'reject'])->name('payments.reject');
});

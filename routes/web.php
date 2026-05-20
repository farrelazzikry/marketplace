<?php

use Illuminate\Support\Facades\Route;

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

// ================= HOME =================
Route::get('/', [HomeController::class, 'index'])->name('home');



// ================= AUTH =================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.process');

Route::get('/register', [AuthController::class, 'register'])->name('register');

// RUTE BARU: Mengirim OTP lewat AJAX saat user masih di halaman register
Route::post('/register/send-otp', [AuthController::class, 'sendOtp'])->name('register.send_otp');

// PROSES DAFTAR AKHIR (Sekaligus Cek OTP)
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// ================= PUBLIC PRODUCT =================
// guest juga bisa lihat produk
Route::prefix('products')
    ->name('products.')
    ->group(function () {

        Route::get('/', [UserProduct::class, 'index'])
            ->name('index');

        Route::get('/{id}', [UserProduct::class, 'show'])
            ->name('show');

    });



// ================= USER =================
Route::middleware(['auth.custom', 'user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/dashboard', [UserDashboard::class, 'index'])
            ->name('dashboard');



        // CART
        Route::get('/cart', [CartController::class, 'index'])
            ->name('cart');

        Route::post('/cart/add/{id}', [CartController::class, 'add'])
            ->name('cart.add');

        Route::post('/cart/update/{id}', [CartController::class, 'update'])
            ->name('cart.update');

        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
            ->name('cart.remove');



        // CHECKOUT
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::post('/checkout/calculate-shipping', [CheckoutController::class, 'calculateShipping'])->name('checkout.calculate-shipping');
        Route::get('/checkout/payment/{order_id}', [CheckoutController::class, 'paymentPage'])->name('checkout.payment');


        // ORDERS
        Route::get('/orders', [UserOrder::class, 'index'])
            ->name('orders');

        Route::post('/orders/upload-proof/{id}', [UserOrder::class, 'uploadProof'])
            ->name('orders.uploadProof');

    });



// ================= ADMIN =================
Route::middleware(['auth.custom', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])
            ->name('dashboard');



        // PRODUCTS
        Route::prefix('products')
            ->name('products.')
            ->group(function () {

            Route::get('/', [AdminProduct::class, 'index'])
                ->name('index');

            Route::post('/store', [AdminProduct::class, 'store'])
                ->name('store');

            Route::post('/{id}/update', [AdminProduct::class, 'update'])
                ->name('update');

            Route::delete('/{id}/delete', [AdminProduct::class, 'destroy'])
                ->name('destroy');

        });



        // ORDERS
        Route::prefix('orders')
            ->name('orders.')
            ->group(function () {

            Route::get('/', [AdminOrder::class, 'index'])
                ->name('index');

            Route::post('/{id}/update-status', [AdminOrder::class, 'updateStatus'])
                ->name('updateStatus');

        });



        // PAYMENTS
        Route::get('/payments', [PaymentController::class, 'index'])
            ->name('payments');

        Route::get('/payments/verify/{id}', [PaymentController::class, 'verify'])
            ->name('payments.verify');

        Route::get('/payments/reject/{id}', [PaymentController::class, 'reject'])
            ->name('payments.reject');

    });
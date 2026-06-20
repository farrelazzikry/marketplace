<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
// USER
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\ProductController as UserProduct;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController as UserOrder;
use App\Http\Controllers\User\ProfileController; // <-- TAMBAHKAN

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\UserController as AdminUser; // <-- TAMBAHKAN

// ================= HOME =================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ================= AUTH =================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.process');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/send-otp', [AuthController::class, 'sendOtp'])->name('register.send_otp');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.process');

// ================= FORGOT & RESET PASSWORD =================
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password/send-otp', [AuthController::class, 'sendForgotOtp'])->name('password.send_otp');
Route::post('/forgot-password/reset', [AuthController::class, 'resetPasswordWithOtp'])->name('password.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/user/payment/notification', [PaymentController::class, 'notification'])
    ->name('payment.notification');

// ================= PUBLIC PRODUCT =================
Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/', [UserProduct::class, 'index'])->name('index');
        Route::get('/{id}', [UserProduct::class, 'show'])->name('show');
    });

// ================= USER =================
Route::middleware(['auth.custom', 'user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');

        // PROFILE (TAMBAHKAN)
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

        // CART
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

        // CHECKOUT
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::post('/checkout/calculate-shipping', [CheckoutController::class, 'calculateShipping'])->name('checkout.calculate-shipping');
        Route::post('/checkout/direct/{productId}', [CheckoutController::class, 'direct'])->name('checkout.direct');

        // PAYMENT
        Route::get('/payment/checkout/{orderId}', [PaymentController::class, 'checkout'])->name('payment.checkout');
        Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

        // ORDERS
        Route::get('/orders', [UserOrder::class, 'index'])->name('orders');
        Route::post('/orders/upload-proof/{id}', [UserOrder::class, 'uploadProof'])->name('orders.uploadProof');
        Route::post('/orders/confirm/{id}', [UserOrder::class, 'confirmReceived'])->name('orders.confirmReceived');
    });

// ================= ADMIN =================
Route::middleware(['auth.custom', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // PRODUCTS
        Route::prefix('products')
            ->name('products.')
            ->group(function () {
            Route::get('/', [AdminProduct::class, 'index'])->name('index');
            Route::post('/store', [AdminProduct::class, 'store'])->name('store');
            Route::post('/{id}/update', [AdminProduct::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [AdminProduct::class, 'destroy'])->name('destroy');
        });

        // ORDERS
        Route::prefix('orders')
            ->name('orders.')
            ->group(function () {
            Route::get('/', [AdminOrder::class, 'index'])->name('index');
            Route::post('/{id}/update-status', [AdminOrder::class, 'updateStatus'])->name('updateStatus');
            Route::post('/{id}/update-tracking', [AdminOrder::class, 'updateTracking'])->name('updateTracking');
        });

        // USERS (TAMBAHKAN)
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
            Route::get('/', [AdminUser::class, 'index'])->name('index');
            Route::post('/{id}/block', [AdminUser::class, 'block'])->name('block');
            Route::post('/{id}/unblock', [AdminUser::class, 'unblock'])->name('unblock');
            Route::post('/{id}/reset-password', [AdminUser::class, 'resetPassword'])->name('resetPassword');
        });
    });
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
Route::get('/user/dashboard', [DashboardController::class, 'user']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/admin/produk', [AdminController::class, 'produk']);
Route::get('/admin/pesanan', [AdminController::class, 'pesanan']);



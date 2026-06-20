<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bagikan variabel $cartCount ke SELURUH view user secara otomatis
        // Karena struktur Cart sudah berubah (Cart langsung = item, tanpa CartItem)
        View::composer(['pages.user.*', 'layout.user', 'components.user.*'], function ($view) {
            if (session()->has('user_id')) {
                $userId = session('user_id');

                // AMBIL SEMUA ITEM CART USER (LANGSUNG DARI TABEL CARTS)
                $cartItems = Cart::with('product')
                    ->where('user_id', $userId)
                    ->get();

                // Hitung jumlah item
                $cartCount = $cartItems->count();

                // Kirim juga cartItems untuk kebutuhan lain
                $view->with([
                    'cartItems' => $cartItems,
                    'cartCount' => $cartCount
                ]);
            } else {
                $view->with([
                    'cartItems' => collect(),
                    'cartCount' => 0
                ]);
            }
        });
    }
}
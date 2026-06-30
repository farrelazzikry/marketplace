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
<<<<<<< HEAD
        // Trik jitu: Share variabel $cartItems ke SELURUH view user secara otomatis
        View::composer(['pages.user.*', 'layout.user', 'components.user.*'], function ($view) {
            if (session()->has('user_id')) {
                $globalCart = Cart::with('items.product')
                    ->where('user_id', session('user_id'))
                    ->first();

                $cartItems = $globalCart ? $globalCart->items : collect();
                $cartCount = $cartItems->count();
            } else {
                $cartItems = collect();
                $cartCount = 0;
            }

            // Lempar secara global, jadi view manapun gak akan kelaparan lagi
            $view->with([
                'cartItems' => $cartItems,
                'cartCount' => $cartCount
            ]);
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        });
    }
}
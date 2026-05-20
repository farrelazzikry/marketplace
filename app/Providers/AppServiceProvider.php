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
        });
    }
}
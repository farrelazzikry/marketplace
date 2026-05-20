<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil produk FLASH SALE (yang ada harga diskon)
        $flashSale = Product::whereNotNull('discount_price')
            ->latest()
            ->take(4)
            ->get();

        // Kumpulkan semua ID produk yang sudah masuk Flash Sale
        $flashSaleIds = $flashSale->pluck('id');

        // 2. Ambil REKOMENDASI (Kecuali produk yang ada di Flash Sale)
        $recommended = Product::whereNotIn('id', $flashSaleIds)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view(
            'home',
            compact(
                'flashSale',
                'recommended'
            )
        );
    }
}
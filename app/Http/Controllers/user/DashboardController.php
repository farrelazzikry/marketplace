<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil produk untuk Flash Sale
        $flashSale = Product::whereNotNull('discount_price')
            ->latest()
            ->take(4)
            ->get();

        // Kumpulkan semua ID produk yang sudah masuk Flash Sale
        $flashSaleIds = $flashSale->pluck('id');

        // 2. Ambil produk untuk rekomendasi (Kecuali produk yang ada di Flash Sale)
        $recommended = Product::whereNotIn('id', $flashSaleIds)
            ->inRandomOrder()
            ->take(4)
            ->get();

        // 3. Ambil produk terbaru (Kecuali produk yang ada di Flash Sale)
        $latest = Product::whereNotIn('id', $flashSaleIds)
            ->latest()
            ->take(6)
            ->get();

        return view(
            'pages.user.dashboard',
            compact(
                'flashSale',
                'recommended',
                'latest'
            )
        );
    }
}
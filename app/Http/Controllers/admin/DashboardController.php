<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL PRODUK
        $totalProducts = Product::count();

        // TOTAL PESANAN
        $totalOrders = Order::count();

        // PESANAN PENDING
        $pendingOrders = Order::where('status', 'pending')->count();

        // PEMBAYARAN PENDING
        $pendingPayments = Order::where('payment_status', 'waiting_verification')->count();

        return view('pages.admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'pendingPayments'
        ));
    }
}
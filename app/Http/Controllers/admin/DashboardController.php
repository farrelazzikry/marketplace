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
<<<<<<< HEAD

=======
            
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        return view('pages.admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'pendingPayments'
        ));
    }
}
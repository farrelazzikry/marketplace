<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\OrderController as AdminOrder;

class OrderController extends Controller
{
    public function index()
    {
        // Ambil data paling fresh dari session
        $allOrders = session()->get('orders');

        // Jika session kosong (mungkin baru pertama buka), ambil dari initial Admin
        if (!$allOrders) {
            $adminCtrl = new AdminOrder;
            $allOrders = $adminCtrl->getInitialOrders();
        }

        // Filter Nama (Pastikan lowercase biar gak sensi sama kapital)
        $myOrders = array_filter($allOrders, function ($order) {
            return isset($order['customer']) && strtolower($order['customer']) === 'farrel';
        });

        return view('pages.user.orders.index', ['orders' => $myOrders]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getInitialOrders()
    {
        return [
            'ORD-001' => [
                'id' => 'ORD-001',
                'customer' => 'Farrel',
                'total' => 'Rp 350.000',
                'items' => 'Hoodie Premium (1)',
                'status' => 'Proses',
                'date' => '2023-10-25'
            ],
            'ORD-002' => [
                'id' => 'ORD-002',
                'customer' => 'Vikram',
                'total' => 'Rp 180.000',
                'items' => 'T-Shirt (1)',
                'status' => 'Proses',
                'date' => '2023-10-26'
            ],
            'ORD-003' => [
                'id' => 'ORD-003',
                'customer' => 'Rafie',
                'total' => 'Rp 500.000',
                'items' => 'Jersey Bola (2)',
                'status' => 'Selesai',
                'date' => '2023-10-27'
            ],
        ];
    }

    public function index()
    {
        $orders = session('orders', $this->getInitialOrders());
        return view('pages.admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        // 1. Ambil data session yang ada, atau initial kalau kosong
        $orders = session()->get('orders', $this->getInitialOrders());

        // 2. Cek apakah ID-nya ada (Pastikan $id ini string 'ORD-001')
        if (isset($orders[$id])) {
            $orders[$id]['status'] = $request->status;

            // 3. Simpan ulang SELURUH array orders ke session
            session()->put('orders', $orders);

            // 4. Paksa simpan ke storage
            session()->save();
        }

        return redirect()->back()->with('success', 'Status updated: ' . $request->status);
    }
}
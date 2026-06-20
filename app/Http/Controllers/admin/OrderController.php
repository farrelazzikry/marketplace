<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user',
            'items.product'
        ])
            ->latest()
            ->get();

        return view('pages.admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        // AUTO PAYMENT COD
        if (
            $order->payment_method == 'cod'
            && $request->status == 'completed'
        ) {
            $order->payment_status = 'paid';
        }

        $order->save();

        return redirect()
            ->back()
            ->with('success', 'Status pesanan berhasil diupdate');
    }
    public function updateTracking(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'tracking_number' => 'required|string|max:255'
        ]);

        $order->update([
            'tracking_number' => $request->tracking_number,
            'status' => 'shipped', // 🔥 OTOMATIS JADI DIKIRIM
        ]);

        return redirect()->back()->with('success', 'Nomor resi berhasil ditambahkan! Status pesanan otomatis berubah menjadi Dikirim.');
    }
}
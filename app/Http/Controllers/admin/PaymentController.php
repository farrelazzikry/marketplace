<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Order::with('user')
            ->whereNotNull('proof_of_payment')
            ->latest()
            ->get();

        return view('pages.admin.payments.index', compact('payments'));
    }

    public function verify($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'payment_status' => 'paid',
            'status' => 'processing'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pembayaran berhasil diverifikasi');
    }

    public function reject($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'payment_status' => 'rejected'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pembayaran berhasil ditolak');
    }
}
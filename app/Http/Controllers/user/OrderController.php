<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', session('user_id'))
            ->latest()
            ->get();

        return view('pages.user.orders.index', compact('orders'));
    }

    public function uploadProof(Request $request, $id)
    {
        $request->validate([
            'proof_of_payment' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $order = Order::findOrFail($id);

        if ($request->hasFile('proof_of_payment')) {

            $file = $request->file('proof_of_payment');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/payments'), $filename);

            $order->update([
                'proof_of_payment' => $filename,
                'payment_status' => 'waiting_verification'
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Bukti pembayaran berhasil upload');
    }
}
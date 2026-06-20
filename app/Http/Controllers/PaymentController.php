<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\MidtransService;

class PaymentController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function checkout($orderId)
    {
        $order = Order::with('user')->findOrFail($orderId);
        $user = $order->user;

        $customerDetails = [
            'first_name' => $order->shipping_name ?? $user->name,
            'email' => $user->email,
            'phone' => $order->shipping_phone ?? '08123456789',
        ];

        $items = [
            [
                'id' => 'order-' . $order->id,
                'price' => (int) $order->total_price,
                'quantity' => 1,
                'name' => 'Pesanan Calvera ID #' . $order->id,
            ]
        ];

        // 🔥 PERBAIKAN: tambahkan order_id ke parameter
        $finishUrl = route('user.payment.success', ['order_id' => $order->id]);

        try {
            $transaction = $this->midtrans->createTransaction(
                $order->id,
                $order->total_price,
                $customerDetails,
                $items,
                $finishUrl
            );

            $order->update([
                'midtrans_order_id' => $transaction['order_id'],
                'midtrans_snap_token' => $transaction['token'],
            ]);

            return redirect($transaction['redirect_url']);
        } catch (\Exception $e) {
            return redirect()->route('user.cart')->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function notification(Request $request)
    {
        \Log::info('Webhook received:', $request->all());

        try {
            $result = $this->midtrans->handleNotification($request->all());
            $order = Order::find($result['order_id']);

            if (!$order) {
                \Log::error('Order not found: ' . $result['order_id']);
                return response('Order not found', 404);
            }

            switch ($result['transaction_status']) {
                case 'capture':
                case 'settlement':
                    $order->update([
                        'payment_status' => 'paid',
                        'status' => 'processing',
                    ]);
                    \Log::info('Order updated to paid: ' . $order->id);
                    break;
                case 'pending':
                    $order->update(['payment_status' => 'waiting_verification']);
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $order->update([
                        'payment_status' => 'rejected',
                        'status' => 'cancelled',
                    ]);
                    break;
            }

            return response('OK', 200);
        } catch (\Exception $e) {
            \Log::error('Webhook error: ' . $e->getMessage());
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        if ($orderId) {
            $orderId = str_replace('order-', '', $orderId);
            $order = Order::find($orderId);
            if ($order && $order->payment_status !== 'paid') {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'processing',
                ]);
            }
        }
        return view('pages.user.payment.success');
    }

    public function cancel()
    {
        return redirect()->route('user.cart')->with('error', 'Pembayaran dibatalkan.');
    }
}
<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = !config('services.midtrans.is_sandbox', true);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

public function createTransaction($orderId, $grossAmount, $customerDetails = [], $items = [], $finishUrl = null)
{
    $params = [
        'transaction_details' => [
            'order_id' => 'order-' . $orderId,
            'gross_amount' => (int) $grossAmount,
        ],
        'customer_details' => $customerDetails,
        'item_details' => $items,
    ];

    if ($finishUrl) {
        $params['finish_redirect_url'] = $finishUrl;
    }

    try {
        $snapResponse = Snap::createTransaction($params);
        return [
            'token' => $snapResponse->token,
            'redirect_url' => $snapResponse->redirect_url,
            'order_id' => $snapResponse->order_id ?? $params['transaction_details']['order_id'],
        ];
    } catch (\Exception $e) {
        throw new \Exception('Midtrans Error: ' . $e->getMessage());
    }
}

    public function handleNotification($payload)
    {
        $notification = new Notification($payload);
        $orderId = str_replace('order-', '', $notification->order_id);

        return [
            'order_id' => (int) $orderId,
            'transaction_status' => $notification->transaction_status,
            'fraud_status' => $notification->fraud_status ?? null,
            'payment_type' => $notification->payment_type ?? null,
            'gross_amount' => $notification->gross_amount ?? 0,
        ];
    }
}
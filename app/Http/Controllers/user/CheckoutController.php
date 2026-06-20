<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\RajaOngkirService;

class CheckoutController extends Controller
{
    protected $rajaOngkir;

    public function __construct(RajaOngkirService $rajaOngkir)
    {
        $this->rajaOngkir = $rajaOngkir;
    }

    public function index(Request $request)
    {
        $selectedIds = json_decode($request->query('selected_items'), true);
        $userId = session('user_id');

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->when(!empty($selectedIds), function ($query) use ($selectedIds) {
                return $query->whereIn('id', $selectedIds);
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('user.cart')
                ->with('error', 'Silahkan pilih minimal satu produk untuk checkout.');
        }

        $cities = $this->rajaOngkir->getCities();

        $totalWeight = 0;
        foreach ($cartItems as $item) {
            $weight = $item->product->weight ?? 1000;
            $totalWeight += $weight * $item->quantity;
        }

        return view('pages.user.checkout.index', compact('cartItems', 'cities', 'totalWeight'));
    }

    public function direct(Request $request, $productId)
    {
        $request->validate([
            'size' => 'required|string',
        ]);

        $userId = session('user_id');
        $product = Product::findOrFail($productId);

        if ($product->stock < 1) {
            return back()->with('error', 'Stok produk habis.');
        }

        $existing = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('size', $request->size)
            ->first();

        if ($existing) {
            $existing->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'size' => $request->size,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('user.checkout')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function calculateShipping(Request $request)
    {
        $request->validate([
            'destination_city_id' => 'required|numeric',
            'weight' => 'required|numeric|min:1',
            'courier' => 'required|in:jne,pos,tiki'
        ]);

        // Ambil nama kota dari city_id
        $cities = $this->rajaOngkir->getCities();
        $cityName = null;
        foreach ($cities as $city) {
            if ($city['city_id'] == $request->destination_city_id) {
                $cityName = $city['city_name'];
                break;
            }
        }

        if (!$cityName) {
            $cityName = 'Jakarta';
        }

        // 🔥 Hitung ongkir berdasarkan kota dan berat (tanpa API)
        $costs = $this->rajaOngkir->getCostByCity($cityName, $request->weight);

        return response()->json([
            'success' => true,
            'costs' => $costs
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
            'city_id' => 'required|numeric', // tambahkan validasi city_id
        ]);

        $userId = session('user_id');

        $selectedIds = json_decode($request->input('selected_cart_ids'), true);

        if (empty($selectedIds)) {
            $raw = $request->input('selected_cart_ids');
            if (is_string($raw) && strpos($raw, ',') !== false) {
                $selectedIds = array_map('trim', explode(',', $raw));
            } elseif (is_string($raw) && $raw !== '' && $raw !== '[]') {
                $selectedIds = [$raw];
            } else {
                $selectedIds = [];
            }
        }

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->when(!empty($selectedIds), function ($query) use ($selectedIds) {
                return $query->whereIn('id', $selectedIds);
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.checkout')
                ->with('error', 'Silahkan pilih minimal satu produk untuk checkout.');
        }

        // 🔥 Hitung ongkir berdasarkan kota yang dipilih
        $cities = $this->rajaOngkir->getCities();
        $cityName = null;
        foreach ($cities as $city) {
            if ($city['city_id'] == $request->city_id) {
                $cityName = $city['city_name'];
                break;
            }
        }

        $shippingCost = $cityName
            ? $this->rajaOngkir->getShippingCostByCity($cityName)
            : 15000;

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?: $item->product->price;
            $subtotal += $price * $item->quantity;
        }

        $total = $subtotal + $shippingCost;

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total,
            'shipping_cost' => $shippingCost,
            'payment_method' => 'midtrans',
            'phone_number' => $request->shipping_phone,
            'address' => $request->shipping_address,
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?: $item->product->price;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $price,
                'size' => $item->size,
            ]);

            $item->product->decrement('stock', $item->quantity);
        }

        Cart::whereIn('id', $cartItems->pluck('id'))->delete();

        return redirect()->route('user.payment.checkout', $order->id);
    }
}
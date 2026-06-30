<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
<<<<<<< HEAD
use App\Services\RajaOngkirService;
use App\Services\QrislyService; // 1. Import Service Qrisly Baru
=======
use App\Models\Product;
use App\Services\RajaOngkirService;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

class CheckoutController extends Controller
{
    protected $rajaOngkir;
<<<<<<< HEAD
    protected $qrislyService; // 2. Daftarkan properti Qrisly

    // 3. Suntikkan (Inject) kedua service ke dalam constructor
    public function __construct(RajaOngkirService $rajaOngkir, QrislyService $qrislyService)
    {
        $this->rajaOngkir = $rajaOngkir;
        $this->qrislyService = $qrislyService;
=======

    public function __construct(RajaOngkirService $rajaOngkir)
    {
        $this->rajaOngkir = $rajaOngkir;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    }

    public function index(Request $request)
    {
<<<<<<< HEAD
        // Ambil query string array ID item yang dipilih dari keranjang
        $selectedIds = json_decode($request->query('selected_items'), true);

        // Load data cart beserta item produknya menggunakan session asli Anda
        $cartQuery = Cart::with([
            'items' => function ($query) use ($selectedIds) {
                if (!empty($selectedIds)) {
                    $query->whereIn('id', $selectedIds);
                }
            },
            'items.product'
        ])->where('user_id', session('user_id'))->first();

        // Validasi jika cart kosong atau tidak ada item yang lolos filter
        if (!$cartQuery || $cartQuery->items->count() == 0) {
=======
        $selectedIds = json_decode($request->query('selected_items'), true);
        $userId = session('user_id');

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->when(!empty($selectedIds), function ($query) use ($selectedIds) {
                return $query->whereIn('id', $selectedIds);
            })
            ->get();

        if ($cartItems->isEmpty()) {
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            return redirect()
                ->route('user.cart')
                ->with('error', 'Silahkan pilih minimal satu produk untuk checkout.');
        }

<<<<<<< HEAD
        $cart = $cartQuery;

        // Ambil data kota dari API RajaOngkir untuk Select Option di form
        $cities = $this->rajaOngkir->getCities();

        // Hitung total berat dalam gram untuk hitungan ongkir
        $totalWeight = 0;
        foreach ($cart->items as $item) {
=======
        $cities = $this->rajaOngkir->getCities();

        $totalWeight = 0;
        foreach ($cartItems as $item) {
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            $weight = $item->product->weight ?? 1000;
            $totalWeight += $weight * $item->quantity;
        }

<<<<<<< HEAD
        return view('pages.user.checkout.index', compact('cart', 'cities', 'totalWeight'));
    }

    // Method untuk handle request AJAX Hitung Ongkir dari Alpine.js
=======
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

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    public function calculateShipping(Request $request)
    {
        $request->validate([
            'destination_city_id' => 'required|numeric',
            'weight' => 'required|numeric|min:1',
            'courier' => 'required|in:jne,pos,tiki'
        ]);

<<<<<<< HEAD
        $costs = $this->rajaOngkir->getCost(
            $request->destination_city_id,
            $request->weight,
            $request->courier
        );
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

        return response()->json([
            'success' => true,
            'costs' => $costs
        ]);
    }

    public function process(Request $request)
    {
<<<<<<< HEAD
        // 4. Perbarui validasi payment_method agar menerima pilihan qris dan seabank
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        $request->validate([
            'shipping_name' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
<<<<<<< HEAD
            'payment_method' => 'required|in:cod,qris,seabank',
            'shipping_cost' => 'required|numeric|min:0',
        ]);

        $userId = session('user_id');
        $selectedIds = json_decode($request->input('selected_cart_ids'), true);

        $cart = Cart::with([
            'items' => function ($query) use ($selectedIds) {
                if (!empty($selectedIds)) {
                    $query->whereIn('id', $selectedIds);
                }
            },
            'items.product'
        ])->where('user_id', $userId)->first();

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->back()->with('error', 'Data pesanan kosong.');
        }

        // Kalkulasi subtotal barang sesuai logika diskon asli Anda
        $subtotal = 0;
        foreach ($cart->items as $item) {
            $price = $item->product->discount_price ? $item->product->discount_price : $item->product->price;
            $subtotal += $price * $item->quantity;
        }

        // Hitung total akhir gabungan dengan ongkir asli pilihan user
        $shippingCost = $request->shipping_cost;
        $total = $subtotal + $shippingCost;

        // 5. Simpan data pesanan utama ke database
=======
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

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total,
            'shipping_cost' => $shippingCost,
<<<<<<< HEAD
            'payment_method' => $request->payment_method,
=======
            'payment_method' => 'midtrans',
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            'phone_number' => $request->shipping_phone,
            'address' => $request->shipping_address,
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending',
<<<<<<< HEAD
            // Jika memilih COD langsung 'unpaid', jika transfer/online diatur ke status tunggu verifikasi
            'payment_status' => $request->payment_method == 'cod' ? 'unpaid' : 'waiting_verification',
        ]);

        // Simpan data detail item pesanan & potong stok barang
        foreach ($cart->items as $item) {
            $price = $item->product->discount_price ? $item->product->discount_price : $item->product->price;
=======
            'payment_status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?: $item->product->price;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $price,
<<<<<<< HEAD
=======
                'size' => $item->size,
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            ]);

            $item->product->decrement('stock', $item->quantity);
        }

<<<<<<< HEAD
        // Bersihkan item produk terpilih dari data keranjang user
        if (!empty($selectedIds)) {
            $cart->items()->whereIn('id', $selectedIds)->delete();
        } else {
            $cart->items()->delete();
        }

        // 6. PERCABANGAN ALUR REDIRECT SEBELUM RETURN

        // --- JALUR QRIS (DINAMIS DENGAN API) ---
        if ($request->payment_method == 'qris') {
            // Panggil service Qrisly untuk memicu pembuatan kode QR dinamis
            $qrisData = $this->qrislyService->generateQRIS($order->id, $total);

            // Masukkan url gambar QR code ke dalam session agar aman dirender di view payment
            session(['current_qris_url' => $qrisData['qr_url']]);

            return redirect()->route('user.checkout.payment', $order->id)
                ->with('success', 'Pesanan berhasil dibuat! Silakan scan kode QRIS untuk menyelesaikan transaksi.');
        }

        // --- JALUR TRANSFER SEABANK ---
        if ($request->payment_method == 'seabank') {
            return redirect()->route('user.checkout.payment', $order->id)
                ->with('success', 'Pesanan berhasil dibuat! Silakan transfer manual ke rekening SeaBank.');
        }

        // --- JALUR COD (DEFAULT BAWAAN ANDA) ---
        return redirect()->route('user.orders')->with('success', 'Pesanan berhasil dibuat');
    }

    /**
     * 7. METHOD BARU: Menampilkan Halaman Detail Instruksi Pembayaran Premium
     */
    public function paymentPage($order_id)
    {
        // Proteksi berlapis: pastikan order ada dan mutlak milik user yang login
        $order = Order::where('id', $order_id)
            ->where('user_id', session('user_id'))
            ->firstOrFail();

        return view('pages.user.checkout.payment', compact('order'));
=======
        Cart::whereIn('id', $cartItems->pluck('id'))->delete();

        return redirect()->route('user.payment.checkout', $order->id);
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    }
}
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    // HALAMAN CART
    public function index()
    {
        $userId = session('user_id');

        // Ambil semua item cart milik user beserta produknya
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?: $item->product->price;
            $total += $price * $item->quantity;
        }

        return view('pages.user.cart.index', compact('cartItems', 'total'));
    }

    // ADD TO CART
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $userId = session('user_id');

        // Cek apakah item dengan product_id dan size yang sama sudah ada
        $existing = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->where('size', $request->size)
            ->first();

        if ($existing) {
            // Jika sudah ada, tambah quantity
            $existing->increment('quantity');
        } else {
            // Buat item cart baru
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'size' => $request->size,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    // UPDATE QUANTITY (via AJAX)
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kuantitas berhasil diperbarui'
        ]);
    }

    // HAPUS ITEM
    public function remove($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Produk dihapus dari keranjang');
    }
}
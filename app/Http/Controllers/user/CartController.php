<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    // HALAMAN CART
    public function index()
    {
        $userId = session('user_id');

        $cart = Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();

        $total = 0;
        // Sediakan array kosong secara default jika cart belum dibuat
        $cartItems = collect();

        if ($cart) {
            $cartItems = $cart->items; // <--- INI DIA BIANG KEROKNYA! Kita definisikan di sini

            foreach ($cart->items as $item) {
                $price = $item->product->discount_price
                    ? $item->product->discount_price
                    : $item->product->price;

                $total += $price * $item->quantity;
            }
        }

        // Pastikan $cartItems ikut di-compact ke view
        return view('pages.user.cart.index', compact('cart', 'cartItems', 'total'));
    }


    // ADD TO CART
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::firstOrCreate([
            'user_id' => session('user_id')
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('size', $request->size)
            ->first();

        if ($cartItem) {

            $cartItem->increment('quantity');

        } else {

            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'size' => $request->size,
                'quantity' => 1,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil ditambahkan');
    }


    // HAPUS ITEM
    public function remove($id)
    {
        $item = CartItem::findOrFail($id);

        $item->delete();

        return back()->with('success', 'Produk dihapus dari cart');
    }
    // Tambahkan method ini di paling bawah atau di bawah fungsi remove()
    public function update(Request $request, $id)
    {
        // Cari item berdasarkan ID item keranjang
        $cartItem = CartItem::findOrFail($id);

        // Validasi input kuantitas minimal 1
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Update data kuantitas di database
        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        // Mengembalikan respon JSON sukses ke Alpine.js
        return response()->json([
            'success' => true,
            'message' => 'Kuantitas berhasil diperbarui'
        ]);
    }
}
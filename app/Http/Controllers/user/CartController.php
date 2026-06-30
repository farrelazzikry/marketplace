<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD

use App\Models\Cart;
use App\Models\CartItem;
=======
use App\Models\Cart;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
use App\Models\Product;

class CartController extends Controller
{
    // HALAMAN CART
    public function index()
    {
        $userId = session('user_id');

<<<<<<< HEAD
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


=======
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

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    // ADD TO CART
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
<<<<<<< HEAD

        $cart = Cart::firstOrCreate([
            'user_id' => session('user_id')
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
=======
        $userId = session('user_id');

        // Cek apakah item dengan product_id dan size yang sama sudah ada
        $existing = Cart::where('user_id', $userId)
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            ->where('product_id', $product->id)
            ->where('size', $request->size)
            ->first();

<<<<<<< HEAD
        if ($cartItem) {

            $cartItem->increment('quantity');

        } else {

            CartItem::create([
                'cart_id' => $cart->id,
=======
        if ($existing) {
            // Jika sudah ada, tambah quantity
            $existing->increment('quantity');
        } else {
            // Buat item cart baru
            Cart::create([
                'user_id' => $userId,
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                'product_id' => $product->id,
                'size' => $request->size,
                'quantity' => 1,
            ]);
        }

<<<<<<< HEAD
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
=======
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    // UPDATE QUANTITY (via AJAX)
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

<<<<<<< HEAD
        // Update data kuantitas di database
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        $cartItem->update([
            'quantity' => $request->quantity
        ]);

<<<<<<< HEAD
        // Mengembalikan respon JSON sukses ke Alpine.js
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        return response()->json([
            'success' => true,
            'message' => 'Kuantitas berhasil diperbarui'
        ]);
    }
<<<<<<< HEAD
=======

    // HAPUS ITEM
    public function remove($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Produk dihapus dari keranjang');
    }
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
}
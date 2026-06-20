<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan kategori
        if ($request->category) {
            $query->where('category', $request->category);
        }

        // Pencarian
        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $products = $query->latest()->get()->map(function ($product) {
            $sizes = explode(',', $product->size ?? '');
            $product->default_size = !empty($sizes) ? trim($sizes[0]) : null;
            return $product;
        });

        return view('pages.user.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.user.products.show', compact('product'));
    }
}
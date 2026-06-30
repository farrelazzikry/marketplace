<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD

=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

<<<<<<< HEAD
        // SEARCH
        if ($request->search) {

            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('category', 'LIKE', '%' . $request->search . '%');

        }

        $products = $query->latest()->get();
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

        return view('pages.user.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
<<<<<<< HEAD

=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        return view('pages.user.products.show', compact('product'));
    }
}
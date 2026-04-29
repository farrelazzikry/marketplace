<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // DATA CATEGORY
    public function getCategories()
    {
        return [
            1 => ['id' => 1, 'name' => 'Hoodie'],
            2 => ['id' => 2, 'name' => 'Celana'],
            3 => ['id' => 3, 'name' => 'Topi'],
            4 => ['id' => 4, 'name' => 'Set Olahraga'],
            5 => ['id' => 5, 'name' => 'Baju']
        ];
    }

    // DATA PRODUCT (SUDAH ADA CATEGORY)
    public function getProducts()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Hoodie',
                'price' => 'Rp 350.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg',
                'desc' => 'Hoodie nyaman dengan bahan premium cocok untuk sehari-hari.',
                'size' => 'M, L, XL'
            ],
            2 => [
                'id' => 2,
                'name' => 'T-Shirt',
                'price' => 'Rp 180.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg',
                'desc' => 'Kaos simpel dengan bahan adem dan nyaman dipakai.',
                'size' => 'S, M, L'
            ],
            3 => [
                'id' => 3,
                'name' => 'Jersey Bola',
                'price' => 'Rp 250.000',
                'category_id' => 4,
                'image' => 'https://imgs.search.brave.com/rqtAew6MX_-nAFb-TAPob0l5KLEIrViWQiBWxppm8vg/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9ib2xhamVyc2V5LmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAyNS8wOS9tdV9hd2F5X2xhZHlfMjQtMjVfMS0zMDB4MzAwLmpwZw',
                'desc' => 'Jersey olahraga dengan bahan breathable dan ringan.',
                'size' => 'M, L, XL'
            ],
            4 => [
                'id' => 4,
                'name' => 'Celana Cargo',
                'price' => 'Rp 275.000',
                'category_id' => 2,
                'image' => 'https://imgs.search.brave.com/rgBy7_d9n14eZy3tV1w_o9CCbK5LP0tjG_u4fK11Hx8/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9jZG4tamFydmlzLXN0b3JlLm9zcy1hcC1zb3V0aGVhc3QtNS5hbGl5dW5jcy5jb20va2FsaWJyZS11cGxvYWQvcHJvZHVrLzIwMjQwNzEwLTE4MTkwMy5qcGVn',
                'desc' => 'Celana cargo dengan banyak kantong.',
                'size' => 'M, L, XL'
            ],
            5 => [
                'id' => 5,
                'name' => 'Topi Snapback',
                'price' => 'Rp 120.000',
                'category_id' => 3,
                'image' => 'https://imgs.search.brave.com/nZ2Tc1GchJTFlZn_yGVpciqBvQNuq1hIjlcipx_k-ZA/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9zdGF0aWMuY2FwaHVudGVycy5jYS8zODI5OC1ob21lX2RlZmF1bHQvbmV3LWVyYS1mbGF0LWJyaW0tOWZpZnR5LWJsYWNrLW9uLWJsYWNrLW5ldy15b3JrLXlhbmtlZXMtbWxiLWJsYWNrLXNuYXBiYWNrLWNhcC53ZWJw',
                'desc' => 'Topi snapback dengan desain modern.',
                'size' => ''
            ],
            6 => [
                'id' => 6,
                'name' => 'Sweater Rajut',
                'price' => 'Rp 300.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg',
                'desc' => 'Sweater rajut hangat dengan desain klasik.',
                'size' => 'M, L, XL'
            ],
            7 => [
                'id' => 7,
                'name' => 'Legging Olahraga',
                'price' => 'Rp 200.000',
                'category_id' => 4,
                'image' => 'https://imgs.search.brave.com/rqtAew6MX_-nAFb-TAPob0l5KLEIrViWQiBWxppm8vg/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9ib2xhamVyc2V5LmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAyNS8wOS9tdV9hd2F5X2xhZHlfMjQtMjVfMS0zMDB4MzAwLmpwZw',
                'desc' => 'Legging olahraga dengan bahan elastis dan nyaman.',
                'size' => 'S, M, L'
            ],
            8 => [
                'id' => 8,
                'name' => 'Ransel Casual',
                'price' => 'Rp 400.000',
                'category_id' => 3,
                'image' => 'https://imgs.search.brave.com/nZ2Tc1GchJTFlZn_yGVpciqBvQNuq1hIjlcipx_k-ZA/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9zdGF0aWMuY2FwaHVudGVycy5jYS8zODI5OC1ob21lX2RlZmF1bHQvbmV3LWVyYS1mbGF0LWJyaW0tOWZpZnR5LWJsYWNrLW9uLWJsYWNrLW5ldy15b3JrLXlhbmtlZXMtbWxiLWJsYWNrLXNuYXBiYWNrLWNhcC53ZWJw',
                'desc' => 'Ransel casual dengan banyak kompartemen.',
                'size' => 'M, L, XL'
            ],
            9 => [
                'id' => 9,
                'name' => 'Jaket Denim',
                'price' => 'Rp 450.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg',
                'desc' => 'Jaket denim klasik dengan potongan modern.',
                'size' => 'M, L, XL, XXL'
            ],
            10 => [
                'id' => 10,
                'name' => 'Celana Jeans',
                'price' => 'Rp 350.000',
                'category_id' => 2,
                'image' => 'https://imgs.search.brave.com/rgBy7_d9n14eZy3tV1w_o9CCbK5LP0tjG_u4fK11Hx8/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9jZG4tamFydmlzLXN0b3JlLm9zcy1hcC1zb3V0aGVhc3QtNS5hbGl5dW5jcy5jb20va2FsaWJyZS11cGxvYWQvcHJvZHVrLzIwMjQwNzEwLTE4MTkwMy5qcGVn',
                'desc' => 'Celana jeans dengan potongan slim fit.',
                'size' => 'S, M, L, XL'
            ],
        ];
    }

    // INDEX (KIRIM PRODUCT + CATEGORY)
    public function index()
    {
        $products = session('products', $this->getProducts());
        $categories = $this->getCategories();

        return view('pages.admin.products.index', compact('products', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function produk()
    {
        return view('admin.produk');
    }

    public function pesanan()
    {
        return view('admin.pesanan');
    }
}
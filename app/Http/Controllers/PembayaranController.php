<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
{
    $pembayaran = [
        [
            'user' => 'Farrel',
            'bukti' => 'image.jpg',
            'status' => 'Menunggu'
        ],
        [
            'user' => 'Budi',
            'bukti' => 'bukti2.jpg',
            'status' => 'Lunas'
        ],
        [
            'user' => 'Andi',
            'bukti' => 'bukti3.jpg',
            'status' => 'Ditolak'
        ]
    ];

    return view('admin.pembayaran', compact('pembayaran'));
}
}

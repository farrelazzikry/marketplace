<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // kalau belum ada di session, set default
        if (!session()->has('pembayaran')) {
            session([
                'pembayaran' => [
                    1 => [
                        'user' => 'Farrel',
                        'bukti' => 'image.jpg',
                        'status' => 'Menunggu'
                    ],
                    2 => [
                        'user' => 'Budi',
                        'bukti' => 'bukti2.jpg',
                        'status' => 'Menunggu'
                    ],
                    3 => [
                        'user' => 'Andi',
                        'bukti' => 'bukti3.jpg',
                        'status' => 'Menunggu'
                    ]
                ]
            ]);
        }

        $pembayaran = session('pembayaran');

        return view('pages.admin.payments.index', compact('pembayaran'));
    }

    // VERIF
    public function verify($id)
    {
        $pembayaran = session('pembayaran');

        if (isset($pembayaran[$id])) {
            $pembayaran[$id]['status'] = 'Lunas';
            session(['pembayaran' => $pembayaran]);
        }

        return redirect()->back();
    }

    // TOLAK
    public function reject($id)
    {
        $pembayaran = session('pembayaran');

        if (isset($pembayaran[$id])) {
            $pembayaran[$id]['status'] = 'Ditolak';
            session(['pembayaran' => $pembayaran]);
        }

        return redirect()->back();
    }
}
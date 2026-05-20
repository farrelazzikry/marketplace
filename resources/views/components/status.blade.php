@props(['status'])

@php

    $labels = [

        // ORDER
        'processing' => 'Diproses',
        'shipped' => 'Dikirim',
        'completed' => 'Selesai',
        'cancelled' => 'Dibatalkan',

        // PAYMENT
        'paid' => 'Lunas',
        'unpaid' => 'Belum Bayar',
        'waiting_verification' => 'Menunggu Verifikasi',
        'rejected' => 'Ditolak',

    ];

    $styles = [

        'processing' => 'bg-blue-500/20 text-blue-400 border border-blue-500/20',

        'shipped' => 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/20',

        'completed' => 'bg-green-500/20 text-green-400 border border-green-500/20',

        'cancelled' => 'bg-red-500/20 text-red-400 border border-red-500/20',

        'paid' => 'bg-green-500/20 text-green-400 border border-green-500/20',

        'unpaid' => 'bg-red-500/20 text-red-400 border border-red-500/20',

        'waiting_verification' => 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/20',

        'rejected' => 'bg-red-500/20 text-red-400 border border-red-500/20',

    ];

@endphp

<span class="px-3 py-1 rounded-full text-xs font-semibold
    {{ $styles[$status] ?? 'bg-gray-500/20 text-gray-300' }}">

    {{ $labels[$status] ?? $status }}

</span>
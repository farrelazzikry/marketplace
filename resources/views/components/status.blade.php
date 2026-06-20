@props(['status'])

@php
    $labels = [
        'processing' => 'Diproses',
        'shipped' => 'Dikirim',
        'completed' => 'Selesai',
        'cancelled' => 'Dibatalkan',
        'paid' => 'Lunas',
        'unpaid' => 'Belum Bayar',
        'waiting_verification' => 'Menunggu Verifikasi',
        'rejected' => 'Ditolak',
    ];

    $styles = [
        'processing' => 'bg-yellow-400 text-black border border-yellow-500',
        'shipped' => 'bg-blue-500 text-white border border-blue-600',
        'completed' => 'bg-green-500 text-white border border-green-600',
        'cancelled' => 'bg-gray-500 text-white border border-gray-600',
        'paid' => 'bg-green-500 text-white border border-green-600',
        'unpaid' => 'bg-gray-300 text-black border border-gray-400',
        'waiting_verification' => 'bg-yellow-400 text-black border border-yellow-500',
        'rejected' => 'bg-red-500 text-white border border-red-600',
    ];
@endphp

<span class="px-3 py-1 rounded-full text-xs font-semibold {{ $styles[$status] ?? 'bg-gray-500/20 text-gray-300' }}">
    {{ $labels[$status] ?? $status }}
</span>
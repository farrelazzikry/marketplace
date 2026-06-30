@props(['status'])

@php
<<<<<<< HEAD

    $labels = [

        // ORDER
=======
    $labels = [
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        'processing' => 'Diproses',
        'shipped' => 'Dikirim',
        'completed' => 'Selesai',
        'cancelled' => 'Dibatalkan',
<<<<<<< HEAD

        // PAYMENT
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        'paid' => 'Lunas',
        'unpaid' => 'Belum Bayar',
        'waiting_verification' => 'Menunggu Verifikasi',
        'rejected' => 'Ditolak',
<<<<<<< HEAD

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

=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
</span>
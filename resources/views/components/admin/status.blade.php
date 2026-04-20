@props(['type' => 'pending'])

@php
    $styles = [
        'pending' => 'bg-yellow-500/20 text-yellow-400',
        'success' => 'bg-green-500/20 text-green-400',
        'lunas' => 'bg-green-500/20 text-green-400',
        'failed' => 'bg-red-500/20 text-red-400',
        'ditolak' => 'bg-red-500/20 text-red-400',
        'proses' => 'bg-blue-500/20 text-blue-400',
    ];
@endphp

<span class="px-3 py-1 rounded-full text-xs {{ $styles[$type] ?? $styles['pending'] }}">
    {{ $slot }}
</span>
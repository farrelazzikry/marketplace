@props(['type' => 'primary'])

@php
    $base = "px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200";

    $styles = [
        'primary' => "bg-[#111827] text-white hover:bg-[#1F2937]",
        'edit' => "bg-[#2563EB] text-white hover:bg-[#1D4ED8]",      // Biru
        'delete' => "bg-[#DC2626] text-white hover:bg-[#B91C1C]",      // Merah
        'verify' => "bg-[#16A34A] text-white hover:bg-[#15803D]",      // Hijau
        'reject' => "bg-[#DC2626] text-white hover:bg-[#B91C1C]",      // Merah (tolak)
    ];
@endphp

<button {{ $attributes->merge([
    'class' => $base . ' ' . ($styles[$type] ?? $styles['primary'])
]) }}>
    {{ $slot }}
</button>
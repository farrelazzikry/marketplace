@props(['type' => 'primary'])

@php
<<<<<<< HEAD
    $base = "px-3 py-1 rounded-md text-sm font-medium transition";

    $styles = [
        'primary' => "bg-white text-black hover:bg-gray-200",
        'edit' => "bg-blue-500 text-white hover:bg-blue-600",
        'delete' => "bg-red-500 text-white hover:bg-red-600",
        'verify' => "bg-green-500 text-white hover:bg-green-600",
        'reject' => "bg-yellow-500 text-black hover:bg-yellow-600",
    ];
@endphp

<button {{ $attributes->merge(['class' => $base . ' ' . ($styles[$type] ?? $styles['primary'])]) }}>
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    {{ $slot }}
</button>
@props(['type' => 'primary'])

@php
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
    {{ $slot }}
</button>
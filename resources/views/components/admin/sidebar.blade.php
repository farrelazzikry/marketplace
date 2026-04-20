@php
    $active = fn($route) => request()->is($route) ? 'text-white font-semibold' : 'text-gray-400 hover:text-white';
@endphp

<div class="w-64 flex-shrink-0 bg-black p-6">

    <h1 class="text-xl font-bold mb-8">CALVERA ID</h1>

    <ul class="space-y-4">

        <li><a href="/admin/dashboard" class="{{ $active('admin/dashboard') }}">Dashboard</a></li>
        <li><a href="/admin/produk" class="{{ $active('admin/produk') }}">Produk</a></li>
        <li><a href="/admin/pesanan" class="{{ $active('admin/pesanan') }}">Pesanan</a></li>
        <li><a href="/admin/pembayaran" class="{{ $active('admin/pembayaran') }}">Pembayaran</a></li>

    </ul>

</div>
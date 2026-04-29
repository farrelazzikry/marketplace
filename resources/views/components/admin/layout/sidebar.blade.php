@php
    $active = fn($route) => request()->is($route)
        ? 'text-white font-semibold'
        : 'text-gray-400 hover:text-white';
@endphp

<div class="w-64 flex-shrink-0 bg-black p-6">

    <h1 class="text-xl font-bold mb-8 text-white">CALVERA ID</h1>

    <ul class="space-y-4">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ $active('admin/dashboard') }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products.index') }}" class="{{ $active('admin/products*') }}">
                Produk
            </a>
        </li>

        <li>
            <a href="{{ route('admin.orders') }}" class="{{ $active('admin/orders') }}">
                Pesanan
            </a>
        </li>

        <li>
            <a href="{{ route('admin.payments') }}" class="{{ $active('admin/payments') }}">
                Pembayaran
            </a>
        </li>

    </ul>

</div>
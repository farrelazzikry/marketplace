@php
    $active = fn($route) => request()->is($route)
        ? 'bg-blue-600/10 text-blue-500 border-r-2 border-blue-500'
        : 'text-gray-500 hover:text-gray-300 hover:bg-gray-900/50';
@endphp

<!-- Overlay Mobile: Pakai z-40 agar di bawah Sidebar (z-50) tapi di atas konten -->
<div x-show="sidebarOpen" x-cloak x-transition:opacity @click="sidebarOpen = false"
    class="fixed inset-0 bg-black/80 z-40 md:hidden">
</div>

<!-- Sidebar: Pastikan z-50 agar selalu di paling depan saat mobile -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 w-64 bg-black border-r border-gray-800 z-50 transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex-shrink-0 min-h-screen">

    <div class="p-6 mb-6 flex items-center justify-between">
        <h1 class="text-xl font-bold tracking-[0.2em] text-white">CALVERA</h1>

        <!-- Tombol Close Sidebar (Hanya Mobile) -->
        <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" x2="6" y1="6" y2="18" />
                <line x1="6" x2="18" y1="6" y2="18" />
            </svg>
        </button>
    </div>

    <nav class="space-y-1">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4 px-6 py-4 transition text-sm {{ $active('admin/dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </svg>
            Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}"
            class="flex items-center gap-4 px-6 py-4 transition text-sm {{ $active('admin/products*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                <path d="m3.3 7 8.7 5 8.7-5" />
                <path d="M12 22V12" />
            </svg>
            Produk
        </a>
        <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-4 px-6 py-4 transition text-sm {{ $active('admin/orders*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                <path d="M3 6h18" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            Pesanan
        </a>
        <a href="{{ route('admin.payments') }}"
            class="flex items-center gap-4 px-6 py-4 transition text-sm {{ $active('admin/payments*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="14" x="2" y="5" rx="2" />
                <line x1="2" x2="22" y1="10" y2="10" />
            </svg>
            Pembayaran
        </a>
    </nav>
</aside>
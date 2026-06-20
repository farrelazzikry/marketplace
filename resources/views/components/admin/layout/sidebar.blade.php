@php
    $active = fn($route) => request()->is($route)
        ? 'bg-[#4B5563] text-white font-medium'
        : 'text-gray-300 hover:text-white hover:bg-white/10';
@endphp

{{-- OVERLAY MOBILE --}}
<div x-show="sidebarOpen" x-cloak x-transition.opacity @click="sidebarOpen = false"
    class="fixed inset-0 bg-black/50 z-50 md:hidden">
</div>

{{-- SIDEBAR --}}
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 w-64 bg-[#424040] border-r border-[#5A5A5A] z-50 transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex-shrink-0 min-h-screen flex flex-col">

    {{-- HEADER SIDEBAR --}}
    <div class="px-6 pt-6 pb-4 flex items-center justify-between">
        <div class="flex justify-center w-full">
            <img src="{{ asset('uploads/logo.png') }}" alt="Logo Calvera" class="max-w-[150px] h-auto">
        </div>
        <button @click="sidebarOpen = false"
            class="md:hidden text-gray-400 hover:text-white p-1 rounded-lg border border-[#5A5A5A]">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <line x1="18" x2="6" y1="6" y2="18" />
                <line x1="6" x2="18" y1="6" y2="18" />
            </svg>
        </button>
    </div>

    {{-- NAVIGASI --}}
    <nav class="px-3 space-y-1 flex-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3.5 px-4 py-3.5 rounded-xl transition text-xs uppercase tracking-wider {{ $active('admin/dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('admin.products.index') }}"
            class="flex items-center gap-3.5 px-4 py-3.5 rounded-xl transition text-xs uppercase tracking-wider {{ $active('admin/products*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5">
                <path
                    d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                <path d="m3.3 7 8.7 5 8.7-5" />
                <path d="M12 22V12" />
            </svg>
            Kelola Produk
        </a>

        <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-3.5 px-4 py-3.5 rounded-xl transition text-xs uppercase tracking-wider {{ $active('admin/orders*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                <path d="M3 6h18" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            Pesanan Customer
        </a>

        {{-- KELOLA USER (TAMBAHKAN) --}}
        <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3.5 px-4 py-3.5 rounded-xl transition text-xs uppercase tracking-wider {{ $active('admin/users*') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Kelola User
        </a>

    </nav>

    {{-- FOOTER SIDEBAR: LOGOUT --}}
    <div class="px-3 pb-6 pt-4 border-t border-[#5A5A5A]">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3.5 px-4 py-3.5 rounded-xl transition text-xs uppercase tracking-wider text-red-400 hover:bg-red-500/10 hover:text-red-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" x2="9" y1="12" y2="12" />
                </svg>
                Logout
            </button>
        </form>
    </div>

</aside>
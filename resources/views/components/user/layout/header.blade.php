<nav class="bg-black border-b border-gray-700 text-white" x-data="{ mobileMenu: false }">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-between gap-4 md:gap-8">

        <!-- LOGO -->
        <a href="{{ session('is_login') && session('role') == 'user' ? route('user.dashboard') : route('home') }}"
            class="text-lg md:text-xl font-bold tracking-widest text-white shrink-0">
            CALVERA ID
        </a>

        <!-- SEARCH (Hidden di Mobile) -->
        <div class="hidden md:flex flex-grow max-w-md relative">
            <input type="text" placeholder="Cari produk..."
                class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:outline-none focus:border-blue-500 transition text-sm">
            <div class="absolute left-3 top-2.5 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>

        <!-- RIGHT SECTION (Desktop) -->
        <div class="hidden md:flex items-center gap-8">
            <div class="flex items-center gap-6 text-sm font-medium">
                @if(session('is_login') && session('role') == 'user')
                    <a href="{{ route('user.orders') }}" class="flex items-center gap-2 hover:text-blue-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                            <path d="M3 6h18" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        Pesanan Saya
                    </a>
                    <a href="{{ route('user.cart') }}" class="flex items-center gap-2 hover:text-blue-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                        Keranjang
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-4">
                @if(session('is_login'))
                    <div class="text-right">
                        <p class="text-gray-400 text-[10px] uppercase italic">Halo,</p>
                        <p class="text-white font-semibold text-xs">{{ session('user_name') }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-white text-xs font-bold transition">LOGOUT</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg text-white text-xs font-bold transition">LOGIN</a>
                @endif
            </div>
        </div>

        <!-- MOBILE BURGER BUTTON (FIXED) -->
        <button @click="mobileMenu = !mobileMenu" class="md:hidden text-gray-400 focus:outline-none w-10 h-10 relative">
            <div class="absolute inset-0 flex items-center justify-center">
                <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg x-show="mobileMenu" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" x2="6" y1="6" y2="18" />
                    <line x1="6" x2="18" y1="6" y2="18" />
                </svg>
            </div>
        </button>
    </div>

    <!-- MOBILE MENU PANEL -->
    <div x-show="mobileMenu" x-cloak x-transition
        class="md:hidden bg-[#0A0A0A] border-t border-gray-800 px-4 py-6 space-y-6">
        <div class="relative w-full">
            <input type="text" placeholder="Cari produk..."
                class="w-full pl-10 pr-4 py-3 bg-gray-900 border border-gray-700 rounded-xl text-sm text-white">
            <div class="absolute left-3 top-3.5 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            @if(session('is_login') && session('role') == 'user')
                <a href="{{ route('user.orders') }}"
                    class="flex items-center gap-3 p-4 bg-gray-900/50 rounded-xl hover:text-blue-400 transition">Pesanan
                    Saya</a>
                <a href="{{ route('user.cart') }}"
                    class="flex items-center gap-3 p-4 bg-gray-900/50 rounded-xl hover:text-blue-400 transition">Keranjang</a>
            @else
                <a href="{{ route('login') }}"
                    class="flex items-center gap-3 p-4 bg-gray-900/50 rounded-xl text-gray-400">Cek Pesanan</a>
            @endif
        </nav>
        <div class="pt-4 border-t border-gray-800">
            @if(session('is_login'))
                <p class="text-white font-bold mb-4">Halo, {{ session('user_name') }}</p>
                <form action="{{ route('logout') }}" method="POST">@csrf
                    <button type="submit" class="w-full bg-red-600 py-3 rounded-xl font-bold text-white">LOGOUT</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full bg-blue-600 py-3 rounded-xl text-center font-bold text-white">LOGIN</a>
            @endif
        </div>
    </div>
</nav>
<nav class="bg-[#080808]/80 backdrop-blur-md border-b border-zinc-900 text-white sticky top-0 z-50 transition-all duration-300"
    x-data="{ mobileMenu: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-8">

        {{-- BRAND LOGO --}}
        <a href="{{ session('is_login') && session('role') == 'user' ? route('user.dashboard') : route('home') }}"
            class="text-xl font-bold tracking-[0.25em] text-white hover:text-[#D4AF37] transition duration-300 shrink-0 font-serif-luxury italic">
            CALVERA ID
        </a>

        {{-- SEARCH BAR DESKTOP --}}
        <div class="hidden md:flex flex-grow max-w-md relative">
            <form action="{{ route('products.index') }}" method="GET" class="w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk...."
                    class="w-full pl-10 pr-4 py-2 rounded-full bg-zinc-900/50 border border-zinc-800 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition text-sm text-zinc-200 placeholder-zinc-700">
                <button type="submit"
                    class="absolute left-3.5 top-2.5 text-zinc-500 hover:text-[#D4AF37] transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </button>
            </form>
        </div>

        {{-- RIGHT NAVIGATION DESKTOP --}}
        <div class="hidden md:flex items-center gap-6">
            <div class="flex items-center gap-6 text-xs uppercase tracking-widest font-medium text-zinc-400">
                @if(session('is_login') && session('role') == 'user')

                    {{-- MENU: PESANAN SAYA + BADGE EMAS AKTIF --}}
                    <a href="{{ route('user.orders') }}"
                        class="flex items-center gap-2 hover:text-white transition duration-300 relative group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                            <path d="M3 6h18" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>Pesanan Saya</span>

                        @if(isset($activeOrdersCount) && $activeOrdersCount > 0)
                            <span
                                class="absolute -top-1.5 -right-3.5 bg-[#D4AF37] text-black text-[9px] font-bold h-4 w-4 rounded-full flex items-center justify-center transition shadow-md shadow-amber-500/10">
                                {{ $activeOrdersCount }}
                            </span>
                        @endif
                    </a>

                    {{-- MENU: KERANJANG + BADGE EMAS JUMLAH PRODUK --}}
                    <a href="{{ route('user.cart') }}"
                        class="flex items-center gap-2 hover:text-white transition duration-300 relative group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                        <span>Keranjang</span>

                        @if(isset($cartCount) && $cartCount > 0)
                            <span
                                class="absolute -top-1.5 -right-3.5 bg-[#D4AF37] text-black text-[9px] font-bold h-4 w-4 rounded-full flex items-center justify-center transition shadow-md shadow-amber-500/10">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                @endif
            </div>

            <div class="h-4 w-[1px] bg-zinc-800"></div>

            {{-- PROFILE / LOGOUT SESSION --}}
            <div class="flex items-center gap-4">
                @if(session('is_login'))
                    <div class="text-right">
                        <p class="text-[9px] uppercase tracking-wider text-zinc-500">Logged In As</p>
                        <p class="text-zinc-200 font-medium text-xs">{{ session('user_name') }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="border border-zinc-800 hover:border-rose-950/40 hover:text-rose-400 px-4 py-2 rounded-full text-zinc-400 text-[11px] tracking-wider font-semibold transition duration-300">
                            LOGOUT
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white hover:bg-[#D4AF37] text-black px-5 py-2 rounded-full text-[11px] tracking-wider font-bold transition duration-300">
                        LOGIN
                    </a>
                @endif
            </div>
        </div>

        {{-- TOGGLE MENU MOBILE --}}
        <button @click="mobileMenu = !mobileMenu"
            class="md:hidden text-zinc-400 hover:text-white focus:outline-none w-10 h-10 flex items-center justify-center rounded-xl bg-zinc-900/50 border border-zinc-800 relative">

            {{-- Notifikasi Indikator Titik Kecil Emas di Burger Menu jika ada Notif Aktif --}}
            @if(session('is_login') && ((isset($cartCount) && $cartCount > 0) || (isset($activeOrdersCount) && $activeOrdersCount > 0)))
                <span class="absolute top-2.5 right-2.5 w-1.5 h-1.5 bg-[#D4AF37] rounded-full animate-ping"></span>
                <span class="absolute top-2.5 right-2.5 w-1.5 h-1.5 bg-[#D4AF37] rounded-full"></span>
            @endif

            <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            <svg x-show="mobileMenu" x-cloak xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" x2="6" y1="6" y2="18" />
                <line x1="6" x2="18" y1="6" y2="18" />
            </svg>
        </button>
    </div>

    {{-- INTERFACE MOBILE LAYOUT --}}
    <div x-show="mobileMenu" x-cloak x-transition.origin.top
        class="md:hidden bg-[#0A0A0A] border-b border-zinc-900 px-4 py-6 space-y-5">

        <form action="{{ route('products.index') }}" method="GET" class="relative w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                class="w-full pl-10 pr-4 py-2.5 bg-zinc-900 border border-zinc-800 rounded-xl text-sm text-white focus:outline-none focus:border-[#D4AF37]">
            <button type="submit" class="absolute left-3 top-3 text-zinc-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </button>
        </form>

        <nav class="flex flex-col gap-2.5 text-sm tracking-wide">
            @if(session('is_login') && session('role') == 'user')

                {{-- Pesanan Saya Mobile + Badge --}}
                <a href="{{ route('user.orders') }}"
                    class="p-3.5 bg-zinc-950 border border-zinc-900 rounded-xl text-zinc-300 hover:text-[#D4AF37] flex items-center justify-between">
                    <span>Pesanan Saya</span>
                    @if(isset($activeOrdersCount) && $activeOrdersCount > 0)
                        <span
                            class="bg-[#D4AF37] text-black text-[10px] font-bold h-5 w-5 rounded-full flex items-center justify-center">
                            {{ $activeOrdersCount }}
                        </span>
                    @endif
                </a>

                {{-- Keranjang Mobile + Badge --}}
                <a href="{{ route('user.cart') }}"
                    class="p-3.5 bg-zinc-950 border border-zinc-900 rounded-xl text-zinc-300 hover:text-[#D4AF37] flex items-center justify-between">
                    <span>Keranjang Belanja</span>
                    @if(isset($cartCount) && $cartCount > 0)
                        <span
                            class="bg-[#D4AF37] text-black text-[10px] font-bold h-5 w-5 rounded-full flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="p-3.5 bg-zinc-950 border border-zinc-900 rounded-xl text-zinc-500 text-center">
                    Cek Status Pesanan
                </a>
            @endif
        </nav>

        <div class="pt-4 border-t border-zinc-900">
            @if(session('is_login'))
                <p class="text-zinc-500 text-xs mb-3">Logged in as: <span
                        class="text-zinc-200 font-medium">{{ session('user_name') }}</span></p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full bg-zinc-950 border border-zinc-900 text-rose-400 py-2.5 rounded-xl text-sm font-semibold tracking-wider">LOGOUT</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full bg-white text-black py-2.5 rounded-xl text-center text-sm font-bold shadow-lg shadow-white/5">LOGIN</a>
            @endif
        </div>
    </div>
</nav>
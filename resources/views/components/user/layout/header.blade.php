<nav class="bg-black border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <a href="{{ route('home') }}" class="text-xl font-bold tracking-widest text-white">
            CALVERA ID
        </a>

        <!-- SEARCH -->
        <div class="w-1/3">
            <input type="text" placeholder="Cari produk..."
                class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:outline-none focus:border-gray-400">
        </div>

        <!-- MENU -->
        <div class="flex items-center gap-6">
            <a href="{{ route('user.orders') }}" class="hover:text-gray-300">
                Pesanan Saya
            </a>

            <a href="{{ route('user.cart') }}" class="hover:text-gray-300">
                Keranjang
            </a>
        </div>

    </div>
</nav>
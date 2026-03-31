<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calvera ID</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0F0F0F] text-white">

    <!-- NAVBAR -->
    <nav class="bg-black border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- LOGO -->
            <div class="text-xl font-bold tracking-widest text-white">
                CALVERA ID
            </div>

            <!-- SEARCH -->
            <div class="w-1/3">
                <input type="text" placeholder="Cari produk..."
                    class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:outline-none focus:border-gray-400">
            </div>

            <!-- MENU -->
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-gray-300">Pesanan Saya</a>
                <a href="#" class="hover:text-gray-300">Keranjang</a>
            </div>

        </div>
    </nav>

    <!-- CONTENT DINAMIS -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-black border-t border-gray-700 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-400">
            © 2026 CALVERA ID
        </div>
    </footer>

</body>

</html>
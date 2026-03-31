<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calvera ID</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

                <a href="#" class="hover:text-gray-300">
                    Pesanan Saya
                </a>

                <a href="#" class="hover:text-gray-300">
                    Keranjang
                </a>

            </div>

        </div>
    </nav>


    <!-- CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- WELCOME -->
        <h1 class="text-3xl font-bold mb-8">
            Selamat Datang di Calvera ID
        </h1>

        <!-- PRODUCT GRID -->
        <div class="grid grid-cols-4 gap-6">

            <!-- PRODUCT CARD -->
            <div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg">

                <img src="https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg">

                <div class="p-4">

                    <h2 class="font-semibold text-lg">
                        Calvera Hoodie
                    </h2>

                    <p class="text-gray-400">
                        Rp 350.000
                    </p>

                    <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg hover:bg-white">
                        Tambah ke Keranjang
                    </button>

                </div>

            </div>

            <!-- PRODUCT CARD -->
            <div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg">

                <img src="https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg" class="w-full">

                <div class="p-4">

                    <h2 class="font-semibold text-lg">
                        Calvera T-Shirt
                    </h2>

                    <p class="text-gray-400">
                        Rp 180.000
                    </p>

                    <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg hover:bg-white">
                        Tambah ke Keranjang
                    </button>

                </div>

            </div>

        </div>

    </main>


    <!-- FOOTER -->
    <footer class="bg-black border-t border-gray-700 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-400">

            © 2026 CALVERA ID

        </div>
    </footer>

</body>

</html>
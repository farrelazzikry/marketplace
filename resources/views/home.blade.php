@extends('layout.headerfooter')

@section('content')

    <h1 class="text-3xl font-bold mb-8">
        Selamat Datang di Calvera ID
    </h1>

    <div class="grid grid-cols-4 gap-6">

        <!-- PRODUCT -->
        <div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg">
            <img src="https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg">
            <div class="p-4">
                <h2 class="font-semibold text-lg">Hoodie</h2>
                <p class="text-gray-400">Rp 350.000</p>
                <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg hover:bg-white">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>

        <!-- PRODUCT -->
        <div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg">
            <img src="https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg">
            <div class="p-4">
                <h2 class="font-semibold text-lg">T-Shirt</h2>
                <p class="text-gray-400">Rp 180.000</p>
                <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg hover:bg-white">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>

    </div>

@endsection
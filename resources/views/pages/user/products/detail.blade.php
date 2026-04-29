@extends('layout.user')

@section('content')

    <div class="container mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- 🖼️ Gambar Produk --}}
            <div>
                <img src="{{ $product['image'] }}" class="w-full rounded-2xl border border-gray-800">
            </div>


            {{-- 📦 Info Produk --}}
            <div class="space-y-6">

                <div>
                    <h1 class="text-3xl font-bold">
                        {{ $product['name'] }}
                    </h1>

                    <p class="text-yellow-500 text-2xl mt-2 font-semibold">
                        {{ $product['price'] }}
                    </p>
                </div>


                {{-- ⭐ Rating (dummy) --}}
                <div class="text-sm text-gray-400">
                    ⭐ 4.8 • 120 Terjual
                </div>


                {{-- 📄 Deskripsi --}}
                <div>
                    <h2 class="font-semibold mb-2">Deskripsi</h2>
                    <p class="text-gray-400 leading-relaxed">
                        {{ $product['desc'] }}
                    </p>
                </div>


                {{-- 📏 Size --}}
                <div>
                    <h2 class="font-semibold mb-2">Pilih Ukuran</h2>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">S</button>
                        <button class="px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">M</button>
                        <button class="px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">L</button>
                        <button class="px-4 py-2 border border-gray-700 rounded-lg hover:bg-gray-800">XL</button>
                    </div>
                </div>


                {{-- 🔢 Quantity --}}
                <div>
                    <h2 class="font-semibold mb-2">Jumlah</h2>

                    <div class="flex items-center gap-3">
                        <button class="px-3 py-1 bg-gray-800 rounded">-</button>
                        <span>1</span>
                        <button class="px-3 py-1 bg-gray-800 rounded">+</button>
                    </div>
                </div>


                {{-- 🛒 Button --}}
                <div class="flex gap-4 pt-4">

                    <button class="flex-1 bg-white text-black font-bold py-3 rounded-xl hover:bg-gray-200 transition">
                        + Keranjang
                    </button>

                    <button
                        class="flex-1 bg-yellow-500 text-black font-bold py-3 rounded-xl hover:bg-yellow-400 transition">
                        Beli Sekarang
                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection
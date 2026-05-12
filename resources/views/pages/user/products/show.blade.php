@extends('layout.user')

@section('content')
    <div class="bg-black text-white min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Ganti bagian ini di show.blade.php -->
            <a href="{{ route('user.dashboard') }}"
                class="text-gray-400 hover:text-white transition flex items-center gap-2 mb-8">
                ← Kembali ke Katalog
            </a>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

                <!-- LEFT: IMAGE -->
                <div class="rounded-2xl overflow-hidden border border-gray-800 shadow-2xl">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-auto object-cover">
                </div>

                <!-- RIGHT: DETAILS -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-4xl font-bold tracking-tight mb-2">{{ $product['name'] }}</h1>
                        <p class="text-2xl text-blue-500 font-semibold">{{ $product['price'] }}</p>
                    </div>

                    <div class="border-t border-gray-800 pt-6">
                        <h3 class="text-lg font-medium text-gray-300 mb-2">Deskripsi Produk</h3>
                        <p class="text-gray-400 leading-relaxed">
                            {{ $product['desc'] }}
                        </p>
                    </div>

                    @if($product['size'])
                        <div class="pt-4">
                            <h3 class="text-lg font-medium text-gray-300 mb-3">Pilih Ukuran</h3>
                            <div class="flex gap-3">
                                @foreach(explode(', ', $product['size']) as $size)
                                    <button
                                        class="px-5 py-2 border border-gray-700 rounded-lg hover:border-white hover:bg-white hover:text-black transition uppercase text-sm font-bold">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- ACTIONS -->
                    <div class="pt-8 flex gap-4">
                        <button
                            class="flex-1 bg-white text-black py-4 rounded-xl font-bold hover:bg-gray-200 transition text-lg shadow-lg">
                            Tambah ke Keranjang
                        </button>
                        <button class="p-4 border border-gray-700 rounded-xl hover:bg-gray-900 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Info Tambahan -->
                    <div class="bg-[#111] p-4 rounded-xl border border-gray-800 space-y-2">
                        <p class="text-xs text-gray-500 flex items-center gap-2">
                            🚚 Pengiriman Gratis untuk wilayah Batam & sekitarnya.
                        </p>
                        <p class="text-xs text-gray-500 flex items-center gap-2">
                            🔄 Pengembalian 7 hari jika barang tidak sesuai.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
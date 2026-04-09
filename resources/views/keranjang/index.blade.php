@extends('layout.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-8">Keranjang Belanja</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between p-4 bg-gray-900 border border-gray-800 rounded-xl">
                <div class="flex items-center gap-4">
                    <img src="https://via.placeholder.com/100" alt="Produk" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h3 class="font-semibold text-lg">Nama Produk Premium</h3>
                        <p class="text-gray-400 text-sm">Varian: Hitam, XL</p>
                        <p class="text-white font-bold mt-1">Rp 250.000</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex items-center border border-gray-700 rounded-lg overflow-hidden">
                        <button class="px-3 py-1 bg-gray-800 hover:bg-gray-700">-</button>
                        <span class="px-4 py-1 bg-black">1</span>
                        <button class="px-3 py-1 bg-gray-800 hover:bg-gray-700">+</button>
                    </div>
                    <button class="text-red-500 hover:text-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-900 border border-gray-800 rounded-xl">
                <div class="flex items-center gap-4">
                    <img src="https://via.placeholder.com/100" alt="Produk" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h3 class="font-semibold text-lg">Produk Limited Edition</h3>
                        <p class="text-gray-400 text-sm">Varian: Default</p>
                        <p class="text-white font-bold mt-1">Rp 500.000</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center border border-gray-700 rounded-lg">
                        <button class="px-3 py-1 bg-gray-800">-</button>
                        <span class="px-4 py-1 bg-black">2</span>
                        <button class="px-3 py-1 bg-gray-800">+</button>
                    </div>
                    <button class="text-red-500 hover:text-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 sticky top-10">
                <h2 class="text-xl font-bold mb-6">Ringkasan Pesanan</h2>
                
                <div class="space-y-4 text-gray-400">
                    <div class="flex justify-between">
                        <span>Total Harga (3 barang)</span>
                        <span>Rp 1.250.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Diskon</span>
                        <span class="text-green-500">- Rp 50.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Pengiriman</span>
                        <span class="text-white">Gratis</span>
                    </div>
                    <hr class="border-gray-800 my-4">
                    <div class="flex justify-between text-white font-bold text-lg">
                        <span>Total Bayar</span>
                        <span class="text-yellow-500">Rp 1.200.000</span>
                    </div>
                </div>

                <button class="w-full mt-8 bg-white text-black font-bold py-3 rounded-lg hover:bg-gray-200 transition-colors">
                    Lanjut Ke Pembayaran
                </button>
                
                <p class="text-xs text-gray-500 mt-4 text-center">
                    Dengan menekan tombol, Anda menyetujui Syarat & Ketentuan Calvera ID.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
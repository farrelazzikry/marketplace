@extends('layout.user')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl mb-8">Keranjang Belanja</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-4">

                <x-user.cart.cart-item image="https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg"
                    name="T-Shirt" variant="Hitam, XL" price="Rp 250.000" qty="1" />

                <x-user.cart.cart-item image="https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg"
                    name="Hoodie" variant="Default" price="Rp 500.000" qty="2" />

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

                    <a href="{{ route('user.checkout') }}">
                        <button
                            class="w-full mt-8 bg-white text-black font-bold py-3 rounded-lg hover:bg-gray-200 transition-colors">
                            Lanjut Ke Pembayaran
                        </button>
                    </a>

                    <p class="text-xs text-gray-500 mt-4 text-center">
                        Dengan menekan tombol, Anda menyetujui Syarat & Ketentuan Calvera ID.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
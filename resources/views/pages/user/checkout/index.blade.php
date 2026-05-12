@extends('layout.user')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl mb-8">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Detail Produk --}}
                <x-user.ui.card>
                    <h2 class="text-xl mb-5">Detail Produk</h2>

                    <div class="space-y-4">
                        <x-user.checkout.checkout-item name="T-Shirt" variant="Hitam, XL • Qty 1" price="Rp 250.000" />

                        <x-user.checkout.checkout-item name="Hoodie" variant="Default • Qty 2" price="Rp 950.000" />
                    </div>
                </x-user.ui.card>

                {{-- Shipping --}}
                <x-user.checkout.shipping-form />

                {{-- Payment --}}
                <x-user.checkout.payment-method />

            </div>

            {{-- RIGHT --}}
            <div class="lg:col-span-1">
                <x-user.ui.summary title="Ringkasan Checkout">

                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>Rp 1.200.000</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Ongkir</span>
                        <span>Gratis</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Diskon</span>
                        <span class="text-green-500">- Rp 50.000</span>
                    </div>

                    <hr class="border-gray-800">

                    <div class="flex justify-between text-white text-lg font-bold">
                        <span>Total</span>
                        <span class="text-yellow-500">Rp 1.150.000</span>
                    </div>

                    <x-slot:footer>
                        <button class="w-full mt-4 bg-white text-black font-bold py-3 rounded-lg">
                            Buat Pesanan
                        </button>
                    </x-slot:footer>

                </x-user.ui.summary>
            </div>

        </div>
    </div>
@endsection
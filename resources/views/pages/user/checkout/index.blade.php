@extends('layout.user')

@section('content')

    <div class="container mx-auto px-6 py-8 text-[#000000]">

        <h1 class="text-3xl mb-8 font-bold tracking-wide text-[#111827]">
            Checkout
        </h1>

        <form action="{{ route('user.checkout.process') }}" method="POST">
            @csrf

            <input type="hidden" name="selected_cart_ids" value="{{ json_encode($cartItems->pluck('id')->toArray()) }}">
            <input type="hidden" name="payment_method" value="midtrans">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <x-user.ui.card>
                        <h2 class="text-xl mb-5 font-semibold text-[#000000]">
                            Detail Produk
                        </h2>

                        <div class="space-y-4">
                            @php $subtotal = 0; @endphp

                            @foreach ($cartItems as $item)
                                @php
                                    $price = $item->product->discount_price ?: $item->product->price;
                                    $total = $price * $item->quantity;
                                    $subtotal += $total;
                                @endphp

                                <x-user.checkout.checkout-item :name="$item->product->name" :variant="'Qty ' . $item->quantity"
                                    :size="$item->size" :price="$price" />
                            @endforeach
                        </div>
                    </x-user.ui.card>

                    <x-user.checkout.shipping-form :cities="$cities" :totalWeight="$totalWeight" />

                    {{-- HAPUS payment-method --}}

                </div>

                <div class="lg:col-span-1">

                    <x-user.ui.summary title="Ringkasan Checkout" :subtotal="$subtotal">

                        <div class="text-xs text-zinc-500 tracking-wide uppercase font-semibold mb-2">
                            Item yang dipesan
                        </div>
                        <div class="max-h-60 overflow-y-auto space-y-2 pr-1 custom-scrollbar">
                            @foreach ($cartItems as $item)
                                <div class="flex justify-between items-center text-xs text-zinc-400">
                                    <span class="truncate max-w-[180px]">{{ $item->product->name }}</span>
                                    <span>x{{ $item->quantity }}</span>
                                </div>
                            @endforeach
                        </div>

                        <x-slot:footer>
                            <button type="submit"
                                class="w-full mt-2 bg-[#111827] hover:bg-[#1F2937] text-white font-bold py-3.5 rounded-xl tracking-wider transition duration-300 shadow-lg uppercase text-sm">
                                Bayar Sekarang
                            </button>
                        </x-slot:footer>

                    </x-user.ui.summary>

                </div>

            </div>

        </form>

    </div>

@endsection
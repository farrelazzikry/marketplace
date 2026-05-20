@extends('layout.user')

@section('content')

    <div class="container mx-auto px-6 py-8 text-white">

        <h1 class="text-3xl mb-8 font-bold tracking-wide text-zinc-100">
            Checkout
        </h1>

        <form action="{{ route('user.checkout.process') }}" method="POST">
            @csrf

            {{-- Input hidden untuk mengirim ID item terpilih ke fungsi process() di controller --}}
            <input type="hidden" name="selected_cart_ids" value="{{ json_encode($cart->items->pluck('id')->toArray()) }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT SIDE (DETAIL, SHIPPING, PAYMENT) --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- DETAIL PRODUK --}}
                    <x-user.ui.card>
                        <h2 class="text-xl mb-5 font-semibold text-zinc-200">
                            Detail Produk
                        </h2>

                        <div class="space-y-4">
                            @php
                                $subtotal = 0;
                            @endphp

                            @foreach ($cart->items as $item)
                                @php
                                    $price = $item->product->discount_price
                                        ? $item->product->discount_price
                                        : $item->product->price;

                                    $total = $price * $item->quantity;
                                    $subtotal += $total;
                                @endphp

                                {{-- Komponen item checkout Calvera ID --}}
                                <x-user.checkout.checkout-item :name="$item->product->name" :variant="'Qty ' . $item->quantity"
                                    :size="$item->size" :price="$price" />
                            @endforeach
                        </div>
                    </x-user.ui.card>

                    {{-- SHIPPING COMPONENT (Menerima data kota dan total berat dari Controller) --}}
                    <x-user.checkout.shipping-form :cities="$cities" :totalWeight="$totalWeight" />

                    {{-- PAYMENT COMPONENT --}}
                    <x-user.checkout.payment-method />

                </div>

                {{-- RIGHT SIDE (SUMMARY) --}}
                <div class="lg:col-span-1">

                    {{-- Komponen Summary yang sudah auto-kalkulasi dinamis lewat Alpine.js --}}
                    <x-user.ui.summary title="Ringkasan Checkout" :subtotal="$subtotal">

                        {{-- Slot Utama: Jika Anda ingin menampilkan info tambahan di atas kalkulasi harga --}}
                        <div class="text-xs text-zinc-500 tracking-wide uppercase font-semibold mb-2">
                            Item yang dipesan
                        </div>
                        <div class="max-h-60 overflow-y-auto space-y-2 pr-1 custom-scrollbar">
                            @foreach ($cart->items as $item)
                                <div class="flex justify-between items-center text-xs text-zinc-400">
                                    <span class="truncate max-w-[180px]">{{ $item->product->name }}</span>
                                    <span>x{{ $item->quantity }}</span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Slot Footer: Diisi tombol submit dengan Luxury Gold Style --}}
                        <x-slot:footer>
                            <button type="submit"
                                class="w-full mt-2 bg-[#D4AF37] hover:bg-[#b8952e] text-black font-bold py-3.5 rounded-xl tracking-wider transition duration-300 shadow-lg shadow-[#D4AF37]/20 uppercase text-sm font-sans">
                                Checkout
                            </button>
                        </x-slot:footer>

                    </x-user.ui.summary>

                </div>

            </div>

        </form>

    </div>

@endsection
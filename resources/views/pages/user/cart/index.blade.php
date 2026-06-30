@extends('layout.user')

@section('content')
<<<<<<< HEAD
    {{-- Pindahkan inisialisasi Alpine.js ke pembungkus paling luar halaman keranjang --}}
    <div x-data="{
            itemsData: [
                @foreach($cartItems as $item)
                    {
                        id: '{{ $item->id }}',
                        price: {{ $item->product->discount_price ?? $item->product->price }},
                        qty: {{ $item->quantity }}
                    },
                @endforeach
            ],
            selectedItems: [
                @foreach($cartItems as $item) '{{ $item->id }}', @endforeach
            ],
            get totalSelectedQty() {
                let total = 0;
                this.itemsData.forEach(item => {
                    if (this.selectedItems.includes(item.id)) {
                        total += parseInt(item.qty);
                    }
                });
                return total;
            },
            get totalSelectedPrice() {
                let total = 0;
                this.itemsData.forEach(item => {
                    if (this.selectedItems.includes(item.id)) {
                        total += (item.price * item.qty);
                    }
                });
                return total;
            }
        }" @cart-qty-updated.window="
            let found = itemsData.find(i => i.id === $event.detail.id);
            if (found) found.qty = $event.detail.qty;
        " class="max-w-7xl mx-auto px-4 py-10 text-white">

        <h1 class="text-2xl font-bold mb-8 font-serif-luxury tracking-wide">Keranjang Belanja</h1>
=======
    <div x-data="{
                itemsData: [
                    @foreach($cartItems as $item)
                        {
                            id: '{{ $item->id }}',
                            price: {{ $item->product->discount_price ?? $item->product->price }},
                            qty: {{ $item->quantity }}
                        },
                    @endforeach
                ],
                selectedItems: [
                    @foreach($cartItems as $item) '{{ $item->id }}', @endforeach
                ],
                get totalSelectedQty() {
                    let total = 0;
                    this.itemsData.forEach(item => {
                        if (this.selectedItems.includes(item.id)) {
                            total += parseInt(item.qty);
                        }
                    });
                    return total;
                },
                get totalSelectedPrice() {
                    let total = 0;
                    this.itemsData.forEach(item => {
                        if (this.selectedItems.includes(item.id)) {
                            total += (item.price * item.qty);
                        }
                    });
                    return total;
                }
            }" @cart-qty-updated.window="
                let found = itemsData.find(i => i.id === $event.detail.id);
                if (found) found.qty = $event.detail.qty;
            " class="max-w-7xl mx-auto px-4 py-10 text-[#000000]">

        <h1 class="text-xl font-bold mb-8 uppercase block tracking-wide text-[#111827]">Keranjang Belanja</h1>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LIST DATA BARANG (KIRI) --}}
            <div class="lg:col-span-2 space-y-4">
                @forelse($cartItems as $item)
                    <x-user.cart.cart-item id="{{ $item->id }}" image="{{ $item->product->image }}"
                        name="{{ $item->product->name }}" price="{{ $item->product->discount_price ?? $item->product->price }}"
                        qty="{{ $item->quantity }}" size="{{ $item->size }}" />
                @empty
<<<<<<< HEAD
                    <div class="text-center py-12 bg-zinc-900 border border-zinc-800 rounded-2xl text-zinc-500">
=======
                    <div class="text-center py-12 bg-[#FFFFFF] border border-[#E0E0E0] rounded-2xl text-black">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                        Keranjang belanjamu kosong.
                    </div>
                @endforelse
            </div>

            {{-- RINGKASAN BELANJA (KANAN) --}}
            <div class="lg:col-span-1">
                <x-user.ui.summary title="Ringkasan Pesanan">

                    <div class="flex justify-between items-center text-sm">
                        <span>Total Barang</span>
<<<<<<< HEAD
                        <span class="text-white font-semibold text-base" x-text="totalSelectedQty + ' Item'"></span>
                    </div>

                    <div class="flex justify-between items-center border-t border-zinc-800/60 pt-4">
                        <span class="text-base font-medium text-zinc-300">Total Bayar</span>
                        <span class="text-xl font-bold text-[#D4AF37]">
=======
                        <span class="text-[#000000] font-semibold text-base" x-text="totalSelectedQty + ' Item'"></span>
                    </div>

                    <div class="flex justify-between items-center border-t border-[#E0E0E0]/60 pt-4">
                        <span class="text-base font-medium text-zinc-300">Total Bayar</span>
                        <span class="text-xl font-bold text-[#111827]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                            Rp <span x-text="new Intl.NumberFormat('id-ID').format(totalSelectedPrice)"></span>
                        </span>
                    </div>

                    <x-slot:footer>
                        <form action="{{ route('user.checkout') }}" method="GET">
                            <input type="hidden" name="selected_items" :value="JSON.stringify(selectedItems)">

                            <button type="submit" :disabled="selectedItems.length === 0"
<<<<<<< HEAD
                                :class="selectedItems.length === 0 ? 'bg-zinc-800 text-zinc-500 cursor-not-allowed shadow-none' : 'bg-white text-black hover:bg-[#D4AF37]'"
                                class="w-full py-3.5 rounded-xl text-center text-sm font-bold tracking-wider transition duration-300 shadow-lg shadow-white/5">
=======
                                :class="selectedItems.length === 0 ? 'bg-[#E0E0E0] text-zinc-500 cursor-not-allowed shadow-none' : 'bg-[#111827] hover:bg-[#1F2937] text-white'"
                                class="w-full py-3.5 rounded-xl text-center text-sm font-bold tracking-wider transition duration-300 shadow-lg">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                                Lanjut Ke Pembayaran
                            </button>
                        </form>
                    </x-slot:footer>

<<<<<<< HEAD
                </x-user.ui.summary> 
=======
                </x-user.ui.summary>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            </div>

        </div>
    </div>
@endsection
@extends('layout.user')

@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10 text-white">

        {{-- HEADER UTAMA --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold font-serif-luxury tracking-wide text-zinc-100">
                Pesanan Saya
            </h1>

            <span
                class="px-4 py-1.5 bg-zinc-900 border border-zinc-800 rounded-full text-zinc-400 text-xs font-semibold tracking-wider">
                {{ $orders->count() }} Pesanan
            </span>
        </div>

        <div class="space-y-8">

            @forelse($orders as $order)

                {{-- MENGGUNAKAN KOMPONEN CARD PREMIUM --}}
                <x-user.ui.card class="!p-0 overflow-hidden">

                    {{-- HEADER CARD PESANAN --}}
                    <div
                        class="px-6 py-4.5 bg-zinc-900/30 border-b border-zinc-900/80 flex flex-wrap justify-between items-center gap-3">
                        <div>
                            <span class="text-xs text-zinc-500 font-bold tracking-widest uppercase block">Tanggal
                                Transaksi</span>
                            <p class="text-sm text-zinc-300 font-medium mt-0.5">
                                {{ $order->created_at->format('d M Y, H:i') }} WIB
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <x-status :status="$order->payment_status" />
                            <x-status :status="$order->status" />
                        </div>
                    </div>

                    {{-- BODY CARD PESANAN --}}
                    <div class="p-6 space-y-6">

                        {{-- DAFTAR ITEM PRODUK --}}
                        <div class="space-y-5">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-5 border-b border-zinc-900/50 pb-5 last:border-0 last:pb-0">

                                    <img src="{{ asset('uploads/products/' . $item->product->image) }}"
                                        class="w-20 h-20 object-cover rounded-xl border border-zinc-800/60 shadow-md">

                                    <div class="flex-1">
                                        <h3 class="font-semibold text-base text-zinc-200 tracking-wide">
                                            {{ $item->product->name }}
                                        </h3>

                                        <p class="text-zinc-500 text-xs mt-1 font-medium">
                                            Jumlah: <span class="text-zinc-400 font-semibold">{{ $item->quantity }}</span>
                                        </p>

                                        <p class="text-[#D4AF37] font-bold text-sm mt-2 tracking-wide">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        {{-- SEPARATOR INFO --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-zinc-900/80">

                            {{-- INFORMASI PENGIRIMAN --}}
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-500 mb-3">
                                    Informasi Pengiriman
                                </h4>
                                <div
                                    class="text-sm text-zinc-300 space-y-1 bg-[#161616]/40 p-4 rounded-xl border border-zinc-900">
                                    <p class="font-semibold text-zinc-200">{{ $order->shipping_name }}</p>
                                    <p class="text-zinc-400 text-xs">{{ $order->shipping_phone }}</p>
                                    <p class="text-zinc-400 text-xs mt-1 leading-relaxed">{{ $order->shipping_address }}</p>
                                </div>
                            </div>

                            {{-- FITUR UPLOAD BUKTI PEMBAYARAN (HANYA JIKA BUKAN COD & BELUM UPLOAD) --}}
                            @if($order->payment_method != 'cod' && !$order->proof_of_payment)
                                <div>
                                    <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-500 mb-3">
                                        Aksi Pembayaran
                                    </h4>

                                    <form action="{{ route('user.orders.uploadProof', $order->id) }}" method="POST"
                                        enctype="multipart/form-data"
                                        class="bg-[#161616]/40 p-4 rounded-xl border border-zinc-900 space-y-3">
                                        @csrf

                                        <div class="relative">
                                            <input type="file" name="proof_of_payment" required
                                                class="w-full text-xs text-zinc-400 bg-zinc-950/80 border border-zinc-800 rounded-lg p-2.5 focus:outline-none focus:border-[#D4AF37] file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-[#D4AF37]/10 file:text-[#D4AF37] hover:file:bg-[#D4AF37]/20 file:cursor-pointer">
                                        </div>

                                        <button
                                            class="w-full bg-white hover:bg-[#D4AF37] text-black text-xs py-2.5 rounded-lg font-bold tracking-wider transition duration-300 shadow-md">
                                            Kirim Bukti Transfer
                                        </button>
                                    </form>
                                </div>
                            @endif

                        </div>

                    </div>

                    {{-- FOOTER CARD PESANAN --}}
                    <div class="px-6 py-4 bg-zinc-900/30 border-t border-zinc-900/80 flex justify-between items-center">
                        <div class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                            Metode: <span class="text-zinc-300 ml-1">{{ strtoupper($order->payment_method) }}</span>
                        </div>

                        <div class="text-right">
                            <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider block">Total
                                Tagihan</span>
                            <span class="text-lg font-extrabold text-[#D4AF37] tracking-wide mt-0.5 block">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                </x-user.ui.card>

            @empty

                {{-- JIKA DATA ORDERAN KOSONG --}}
                <div class="text-center py-24 border border-dashed border-zinc-800 rounded-3xl bg-[#111111]/30">
                    <p class="text-zinc-500 text-base font-medium">
                        Belum ada riwayat transaksi pesanan.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

@endsection
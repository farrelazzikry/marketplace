@extends('layout.user')

@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10 text-[#000000]">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-xl font-extrabold uppercase block tracking-wide text-[#111827]">
                Pesanan Saya
            </h1>
            <span
                class="px-4 py-1.5 bg-[#424040] border border-[#E0E0E0] rounded-full text-white text-xs font-semibold tracking-wider">
                {{ $orders->count() }} Pesanan
            </span>
        </div>

        <div class="space-y-8">

            @forelse($orders as $order)

                <x-user.ui.card class="!p-0 overflow-hidden">

                    {{-- HEADER --}}
                    <div
                        class="px-6 py-4.5 bg-[#424040] border-b border-[#444444] flex flex-wrap justify-between items-center gap-3">
                        <div>
                            <span class="text-xs text-white font-bold tracking-widest uppercase block">Tanggal Transaksi</span>
                            <p class="text-sm text-white font-medium mt-0.5">
                                {{ $order->created_at->format('d M Y, H:i') }} WIB
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <x-status :status="$order->payment_status" />
                            <x-status :status="$order->status" />
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="p-6 space-y-6">

                        {{-- ITEM PRODUK --}}
                        <div class="space-y-5">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-5 border-b border-[#CCCCCC]/50 pb-5 last:border-0 last:pb-0">
                                    <img src="{{ asset('uploads/products/' . $item->product->image) }}"
                                        class="w-20 h-20 object-cover rounded-xl border border-[#E0E0E0]/60 shadow-md">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-base text-[#000000] tracking-wide">
                                            {{ $item->product->name }}
                                        </h3>
                                        <p class="text-zinc-500 text-xs mt-1 font-medium">
                                            Jumlah: <span class="text-zinc-400 font-semibold">{{ $item->quantity }}</span>
                                        </p>
                                        <p class="text-[#111827] font-bold text-sm mt-2 tracking-wide">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- INFORMASI PENGIRIMAN --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-[#CCCCCC]/80">

                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-widest text-zinc-500 mb-3">
                                    Informasi Pengiriman
                                </h4>
                                <div
                                    class="text-sm text-zinc-300 space-y-1 bg-[#FFFFFF]/40 p-4 rounded-xl border border-[#CCCCCC]">
                                    <p class="font-semibold text-[#000000]">{{ $order->shipping_name }}</p>
                                    <p class="text-zinc-400 text-xs">{{ $order->shipping_phone }}</p>
                                    <p class="text-zinc-400 text-xs mt-1 leading-relaxed">{{ $order->shipping_address }}</p>

                                    {{-- TAMPILKAN RESI JIKA ADA --}}
                                    @if($order->tracking_number)
                                        <div class="mt-3 pt-3 border-t border-[#CCCCCC]">
                                            <p class="text-xs text-zinc-500 font-bold uppercase tracking-widest">Nomor Resi</p>
                                            <p class="text-sm font-semibold text-blue-600">{{ $order->tracking_number }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- KOSONGKAN SISI KANAN --}}
                            <div></div>

                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div
                        class="px-6 py-4 bg-[#424040] border-t border-[#444444] flex flex-wrap justify-between items-center gap-3">
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                                Metode: <span class="text-white ml-1">{{ strtoupper($order->payment_method) }}</span>
                            </div>

                            {{-- TOMBOL KONFIRMASI TERIMA --}}
                            @if($order->status == 'shipped' && $order->payment_status == 'paid')
                                <form action="{{ route('user.orders.confirmReceived', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Apakah pesanan sudah Anda terima dengan baik?')"
                                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold px-4 py-1.5 rounded-lg transition duration-300">
                                        📦 Pesanan Diterima
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="text-right">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Total
                                Tagihan</span>
                            <span class="text-lg font-extrabold text-white tracking-wide mt-0.5 block">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                </x-user.ui.card>

            @empty
                <div class="text-center py-24 border border-dashed border-[#E0E0E0] rounded-3xl bg-[#FFFFFF]/30">
                    <p class="text-zinc-500 text-base font-medium">Belum ada riwayat transaksi pesanan.</p>
                </div>
            @endforelse

        </div>

    </div>

@endsection
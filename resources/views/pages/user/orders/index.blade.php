@extends('layout.user')

@section('content')
    {{-- Memastikan data session paling fresh yang ditarik --}}
    @php
        $adminCtrl = new \App\Http\Controllers\Admin\OrderController();
        $orders = session('orders', $adminCtrl->getInitialOrders());

        // Filter manual di blade supaya PASTI sinkron dengan data session terbaru
        $orders = array_filter($orders, function ($o) {
            return strtolower($o['customer']) === 'farrel';
        });
    @endphp

    <div class="min-h-screen text-white">
        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl tracking-tight">Pesanan Saya</h1>
                <span class="text-zinc-500 text-sm">{{ count($orders) }} Pesanan ditemukan</span>
            </div>

            <div class="space-y-6">
                @forelse($orders as $order)
                    <div
                        class="bg-zinc-900/40 border border-zinc-800 rounded-2xl overflow-hidden hover:border-zinc-700 transition duration-300 backdrop-blur-sm">

                        {{-- HEADER CARD: ID & Status --}}
                        <div class="bg-zinc-900/80 px-6 py-3 flex justify-between items-center border-b border-zinc-800">
                            <div class="flex items-center gap-3">
                                <span class="text-blue-500 font-mono text-sm font-bold">{{ $order['id'] }}</span>
                                <span class="text-zinc-700">|</span>
                                <span class="text-zinc-500 text-[10px] font-medium tracking-tighter">{{ $order['date'] }}</span>
                            </div>

                            {{-- Status Badge yang dinamis ngikutin Admin --}}
                            <span
                                class="px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-widest
                                        {{ $order['status'] == 'Proses' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : '' }}
                                        {{ $order['status'] == 'Dikirim' ? 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20' : '' }}
                                        {{ $order['status'] == 'Selesai' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : '' }}
                                        {{ $order['status'] == 'Refund' ? 'bg-red-500/10 text-red-400 border border-red-500/20' : '' }}">
                                ● {{ $order['status'] }}
                            </span>
                        </div>

                        {{-- BODY: Detail Produk & Pengiriman --}}
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kolom Kiri: Produk -->
                            <div class="flex gap-4">
                                <div
                                    class="w-20 h-20 bg-zinc-950 rounded-xl flex items-center justify-center border border-zinc-800 shrink-0 shadow-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-zinc-800" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white mb-1 leading-tight">{{ $order['items'] }}</h3>
                                    <p class="text-zinc-500 text-xs mb-2 italic">Official Store • Original</p>
                                    <p class="text-blue-400 font-extrabold tracking-tight text-lg">{{ $order['total'] }}</p>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Detail Pengiriman (Nyatu sama background) -->
                            <div class="space-y-4 pt-4 md:pt-0 border-t md:border-t-0 md:border-l border-zinc-800/50 md:pl-8">
                                <div>
                                    <h4 class="text-[10px] font-black text-zinc-600 uppercase tracking-[0.2em] mb-1">Logistik
                                    </h4>
                                    <p class="text-sm text-zinc-400 leading-relaxed">Farrel | (+62) 812-xxxx-xxxx<br>Jl. Raden
                                        Patah No. 12, Baloi, Batam</p>
                                </div>
                            </div>
                        </div>

                        {{-- FOOTER: Action Buttons --}}
                        <div class="px-6 py-4 bg-zinc-900/30 border-t border-zinc-800/50 flex justify-end items-center gap-3">
                            <p class="text-[10px] text-zinc-600 mr-auto italic font-medium uppercase tracking-widest">
                                Auto-Synced with Admin</p>

                            @if($order['status'] == 'Dikirim')
                                <button
                                    class="bg-blue-600 hover:bg-blue-500 text-white text-[11px] font-black py-2 px-5 rounded-lg transition shadow-lg shadow-blue-900/20 uppercase tracking-wider">
                                    Lacak Paket
                                </button>
                            @endif

                            @if($order['status'] == 'Selesai')
                                <button
                                    class="border border-zinc-700 hover:bg-zinc-800 text-white text-[11px] font-black py-2 px-5 rounded-lg transition uppercase tracking-wider">
                                    Ulasan Bintang 5
                                </button>
                            @endif

                            <button
                                class="bg-white text-black text-[11px] font-black py-2 px-5 rounded-lg hover:bg-zinc-200 transition shadow-xl uppercase tracking-wider">
                                Chat Admin
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-24 bg-transparent rounded-3xl border-2 border-dashed border-zinc-900">
                        <div class="mb-4 flex justify-center">
                            <div class="p-4 bg-zinc-900/50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-zinc-700" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-zinc-600 font-bold text-lg">Belum ada riwayat pesanan.</p>
                        <p class="text-zinc-700 text-sm mt-1">Mulai belanja untuk melihat pesananmu di sini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
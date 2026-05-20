@extends('layout.user') {{-- Sesuaikan dengan master layout Anda --}}

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#09090b]">
        <div
            class="max-w-md w-full space-y-6 bg-zinc-900/60 border border-zinc-800 p-8 rounded-2xl shadow-xl backdrop-blur-md">

            <div class="text-center">
                <h2 class="text-2xl font-extrabold tracking-wide text-zinc-100">
                    Selesaikan Pembayaran
                </h2>
                <p class="mt-2 text-xs text-zinc-400">
                    Order ID: <span class="font-mono text-zinc-300">#{{ $order->id }}</span> | Metode: <span
                        class="uppercase text-[#D4AF37] font-semibold">{{ $order->payment_method }}</span>
                </p>
            </div>

            {{-- Box Total Tagihan --}}
            <div class="bg-zinc-950 p-4 rounded-xl border border-zinc-800 text-center">
                <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest block mb-1">Total Tagihan</span>
                <span class="text-3xl font-black text-[#D4AF37] tracking-wide">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </span>
            </div>

            {{-- Tampilan conditional berdasarkan metode pembayaran --}}
            @if($order->payment_method == 'qris')
                {{-- BLOK TAMPILAN QRIS DINAMIS --}}
                <div class="flex flex-col items-center justify-center space-y-4">
                    <p class="text-xs text-zinc-400 text-center px-4">
                        Silakan scan kode QRIS resmi Calvera ID di bawah menggunakan E-Wallet atau M-Banking Anda:
                    </p>

                    <div
                        class="bg-white p-4 rounded-2xl inline-block shadow-xl transform transition hover:scale-105 duration-300">
                        @if(session('current_qris_url'))
                            <img src="{{ session('current_qris_url') }}" alt="QRIS Code Dinamis" class="w-52 h-52 object-contain">
                        @else
                            {{-- Fallback generator otomatis jika session hilang secara tidak sengaja --}}
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=CalveraID-Order-{{ $order->id }}-Total-{{ $order->total_price }}"
                                alt="QRIS Code Fallback" class="w-52 h-52 object-contain">
                        @endif
                    </div>

                    <span class="text-xs font-bold text-zinc-400 tracking-widest uppercase">CALVERA ID STORE</span>
                </div>
            @elseif($order->payment_method == 'seabank')
                {{-- BLOK TAMPILAN SEABANK --}}
                <div class="space-y-4">
                    <p class="text-xs text-zinc-400">Silakan lakukan transfer manual dengan nominal pas ke rekening berikut:</p>
                    <div class="bg-zinc-950 p-5 rounded-xl border border-zinc-800 space-y-3">
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider mb-1">Nama Bank</p>
                            <p class="text-sm font-bold text-zinc-200">SeaBank (Kesejahteraan Ekonomi)</p>
                        </div>
                        <hr class="border-zinc-800">
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider mb-1">Nomor Rekening</p>
                            <p class="text-xl font-mono text-[#D4AF37] font-bold tracking-widest">9012 3456 7890</p>
                        </div>
                        <hr class="border-zinc-800">
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider mb-1">Atas Nama</p>
                            <p class="text-xs text-white font-semibold">PT Calvera ID Solusindo</p>
                        </div>
                    </div>
                    <p
                        class="text-[11px] text-amber-500 font-medium text-center bg-amber-500/5 py-2 rounded-lg border border-amber-500/10">
                        * Simpan bukti transfer untuk diunggah di halaman invoice pesanan Anda.
                    </p>
                </div>
            @endif

            <hr class="border-zinc-800 my-2">

            {{-- Navigasi Tombol Aksi --}}
            <div class="flex flex-col gap-2">
                <a href="{{ route('user.orders') }}"
                    class="w-full text-center bg-[#D4AF37] hover:bg-[#bfa032] text-zinc-950 font-bold py-3 px-4 rounded-xl transition duration-200 text-sm tracking-wide shadow-md shadow-[#D4AF37]/10">
                    Saya Sudah Membayar
                </a>
                <a href="{{ route('user.orders') }}"
                    class="w-full text-center bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-semibold py-2.5 px-4 rounded-xl transition duration-200 text-xs">
                    Cek Riwayat Pesanan
                </a>
            </div>

        </div>
    </div>
@endsection
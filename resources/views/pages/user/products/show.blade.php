@extends('layout.user')

@section('content')
    <div class="py-6 text-white min-h-screen">

        {{-- Tombol Kembali Minimalis --}}
        <div class="mb-8">
            <a href="{{ route('products.index') }}"
                class="text-[11px] uppercase tracking-widest text-zinc-500 hover:text-[#D4AF37] transition duration-300 flex items-center gap-2">
                ← Back To Catalogue
            </a>
        </div>

        {{-- Layout Utama Detail Produk --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- SISI KIRI: DISPLAY FOTO PRODUK --}}
            <div class="rounded-2xl overflow-hidden border border-zinc-900 bg-zinc-950/40 p-2 shadow-2xl">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-auto object-cover rounded-xl shadow-inner">
            </div>

            {{-- SISI KANAN: RINCIAN SPESIFIKASI & FORM ORDER --}}
            <div class="space-y-8">

                {{-- Informasi Nama & Harga --}}
                <div class="space-y-3 pb-6 border-b border-zinc-900/60">
                    <h1 class="text-2xl md:text-4xl font-light tracking-tight text-white font-serif-luxury">
                        {{ $product->name }}
                    </h1>

                    <div class="pt-2">
                        @if($product->discount_price)
                            <div class="flex items-baseline gap-3">
                                <span class="text-xl md:text-2xl text-[#D4AF37] font-semibold tracking-wider">
                                    IDR {{ number_format($product->discount_price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs md:text-sm text-zinc-600 line-through tracking-wide">
                                    IDR {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                        @else
                            <span class="text-xl md:text-2xl text-zinc-300 font-medium tracking-wider">
                                IDR {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Status Stok --}}
                <div class="flex items-center gap-2 text-xs tracking-wide">
                    <span class="text-zinc-500">Availability:</span>
                    @if($product->stock > 0)
                        <span
                            class="text-emerald-400 font-medium bg-emerald-500/10 px-2.5 py-0.5 rounded-full text-[10px] uppercase border border-emerald-500/20">
                            In Stock ({{ $product->stock }})
                        </span>
                    @else
                        <span
                            class="text-rose-400 font-medium bg-rose-500/10 px-2.5 py-0.5 rounded-full text-[10px] uppercase border border-rose-500/20">
                            Out of Stock
                        </span>
                    @endif
                </div>

                {{-- Deskripsi Produk --}}
                <div class="space-y-2">
                    <h3 class="text-xs uppercase tracking-widest text-zinc-400 font-semibold">
                        Description
                    </h3>
                    <p class="text-sm text-zinc-400 leading-relaxed font-light">
                        {{ $product->description }}
                    </p>
                </div>

                {{-- Formulir Tambah Ke Keranjang --}}
                <div class="pt-4 border-t border-zinc-900/60">
                    @if(session('is_login'))
                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST" class="space-y-6">
                            @csrf

                            {{-- Seleksi Ukuran --}}
                            <div class="space-y-2">
                                <label class="block text-[11px] uppercase tracking-widest text-zinc-400 font-medium">
                                    Select Size
                                </label>
                                <div class="relative">
                                    <select name="size" required
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-sm text-zinc-200 outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300 appearance-none">
                                        <option value="" disabled selected>-- Pilih Ukuran --</option>
                                        @foreach(explode(',', $product->size) as $size)
                                            <option value="{{ trim($size) }}">
                                                {{ trim($size) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-500">
                                        <span class="text-[10px]">▼</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Submit --}}
                            <button type="submit"
                                class="w-full bg-white hover:bg-[#D4AF37] text-black text-xs uppercase tracking-widest font-bold py-3.5 rounded-xl transition duration-300 shadow-xl shadow-white/5">
                                Masukkan Keranjang
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="block w-full text-center bg-zinc-900 border border-zinc-800 hover:border-zinc-700 text-white text-xs uppercase tracking-widest font-bold py-3.5 rounded-xl transition duration-300">
                            Sign In To Purchase
                        </a>
                    @endif
                </div>

                {{-- Jaminan Informasi Ekstra --}}
                <div class="bg-zinc-950/40 p-4 rounded-xl border border-zinc-900/80 space-y-2.5">
                    <div class="flex items-center gap-3 text-xs text-zinc-500">
                        <span class="text-base">🚚</span>
                        <span class="tracking-wide">Pengiriman instan bebas biaya khusus kawasan Batam.</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-zinc-500">
                        <span class="text-base">🛡️</span>
                        <span class="tracking-wide">Garansi autentikasi & pengembalian penukaran produk 7 hari.</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
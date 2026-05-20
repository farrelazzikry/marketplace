@extends('layout.user')

@section('content')
    <div class="space-y-16">

        {{-- Ucapan --}}
        <div class="relative pb-6 border-b border-zinc-900/60">
            <p class="text-[10px] uppercase tracking-[0.3em] text-[#D4AF37] font-semibold mb-1">Halaman Utama</p>
            <h1 class="text-3xl md:text-4xl font-light tracking-tight text-white font-serif-luxury">
                Selamat Datang, <span class="font-normal">{{ session('user_name') }}</span>
            </h1>
            <p class="text-xs text-zinc-500 tracking-wide mt-1.5">
                Eksplorasi Produk Pilihan, Penawaran Eksklusif </br>
                Rekomendasi yang Disesuaikan untuk Anda di Calvera ID. Temukan rilisan produk kurasi terbaik pilihan dengan
                kualitas pengerjaan tertinggi hari ini.</br>
            </p>
        </div>

        {{-- Bagian Flash Sale --}}
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <div class="space-y-1">
                    <span class="text-[9px] uppercase tracking-widest text-rose-500 font-bold animate-pulse">Limited
                        Opportunity</span>
                    <h2 class="text-lg md:text-xl font-medium tracking-wide text-white">Flash Sale</h2>
                </div>
                <a href="{{ route('products.index') }}"
                    class="text-xs uppercase tracking-widest text-[#D4AF37] hover:text-white transition duration-300 font-medium border-b border-[#D4AF37]/20 pb-0.5">
                    See Collection
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($flashSale as $product)
                    <x-user.product.product-card :id="$product->id" :image="$product->image" :name="$product->name"
                        :price="$product->price" :discount="$product->discount_price" />
                @endforeach
            </div>
        </div>

        {{-- Bagian Rekomendasi untuk Anda --}}
        <div class="space-y-6">
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-zinc-500 font-medium">Tailored for your taste</span>
                <h2 class="text-lg md:text-xl font-medium tracking-wide text-white">Rekomendasi Untuk Kamu</h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($recommended as $product)
                    <x-user.product.product-card :id="$product->id" :image="$product->image" :name="$product->name"
                        :price="$product->price" />
                @endforeach
            </div>
        </div>

        {{-- Bagian Produk Terbaru --}}
        <div class="space-y-6">
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-zinc-500 font-medium">Fresh Additions</span>
                <h2 class="text-lg md:text-xl font-medium tracking-wide text-white">Produk Terbaru</h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($latest as $product)
                    <x-user.product.product-card :id="$product->id" :image="$product->image" :name="$product->name"
                        :price="$product->price" />
                @endforeach
            </div>
        </div>

    </div>
@endsection
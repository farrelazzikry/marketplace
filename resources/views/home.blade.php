@extends('layout.user')

@section('content')
    <div class="space-y-20">

        {{-- 🌌 MINIMALIST EMBEDDED HERO BANNER --}}
        <div
            class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-zinc-950 via-zinc-900 to-black border border-zinc-900 p-8 md:p-16 flex flex-col justify-center items-center text-center min-h-[340px] shadow-2xl">
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-zinc-900/40 via-transparent to-transparent">
            </div>
            <span class="text-[10px] uppercase tracking-[0.4em] text-[#D4AF37] font-bold mb-3">Seasonal Exhibition</span>
            <h1 class="text-3xl md:text-5xl font-light tracking-tight text-white font-serif-luxury max-w-2xl leading-tight">
                Elevate Your Everyday <br><span class="italic font-normal">Essentials Code</span>
            </h1>
            <p class="text-xs text-zinc-500 tracking-wide mt-4 max-w-md leading-relaxed">
                Selamat Datang di Calvera ID. Temukan rilisan produk kurasi terbaik pilihan dengan kualitas pengerjaan
                tertinggi hari ini.
            </p>
            <a href="{{ route('products.index') }}"
                class="mt-8 bg-white hover:bg-[#D4AF37] text-black text-[10px] tracking-widest font-bold uppercase px-6 py-3 rounded-full transition duration-300 shadow-xl shadow-white/5">
                Browse Catalogue
            </a>
        </div>

        {{-- 🔥 HORIZONTAL SNAP FLASH SALE --}}
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <div class="space-y-1">
                    <span class="text-[9px] uppercase tracking-widest text-rose-500 font-bold animate-pulse">Limited
                        Opportunity</span>
                    <h2 class="text-lg md:text-xl font-medium tracking-wide text-white">Flash Sale</h2>
                </div>
                <a href="{{ route('products.index') }}"
                    class="text-xs uppercase tracking-widest text-[#D4AF37] hover:text-white transition duration-300 font-medium border-b border-[#D4AF37]/20 pb-0.5">
                    View All
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($flashSale as $product)
                    <x-user.product.product-card :id="$product->id" :image="$product->image" :name="$product->name"
                        :price="$product->price" :discount="$product->discount_price" />
                @endforeach
            </div>
        </div>  

        {{-- 🎯 INTUITIVE RECOMMENDED COLL --}}
        <div id="explore-catalogue" class="space-y-6 pt-6">
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-zinc-500 font-medium">Handpicked Just For You</span>
                <h2 class="text-lg md:text-xl font-medium tracking-wide text-white">Rekomendasi Untuk Kamu</h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($recommended as $product)
                    <x-user.product.product-card :id="$product['id']" :image="$product['image']" :name="$product['name']"
                        :price="$product['price']" :discount="$product['discount_price'] ?? null" />
                @endforeach
            </div>
        </div>

    </div>
@endsection
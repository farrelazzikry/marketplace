@extends('layout.user')

@section('content')
    <div class="space-y-16">

        {{-- Kategori --}}
        <div class="space-y-6">
            <div class="space-y-1">
                <h2 class="text-xl md:text-xl font-bold tracking-wide text-[#000000] text-center">
                    KATEGORI
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <a href="{{ route('products.index', ['category' => 'Atasan']) }}"
                    class="bg-white border border-[#E5E7EB] rounded-2xl p-6 hover:border-[#D1D5DB] hover:-translate-y-1 transition-all duration-300">

                    <h3 class="font-semibold text-[#111827]">
                        Atasan
                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">
                        Kaos, Kemeja, Hoodie
                    </p>
                </a>

                <a href="{{ route('products.index', ['category' => 'Bawahan']) }}"
                    class="bg-white border border-[#E5E7EB] rounded-2xl p-6 hover:border-[#D1D5DB] hover:-translate-y-1 transition-all duration-300">

                    <h3 class="font-semibold text-[#111827]">
                        Bawahan
                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">
                        Celana & Shorts
                    </p>
                </a>

                <a href="{{ route('products.index', ['category' => 'Aksesoris']) }}"
                    class="bg-white border border-[#E5E7EB] rounded-2xl p-6 hover:border-[#D1D5DB] hover:-translate-y-1 transition-all duration-300">

                    <h3 class="font-semibold text-[#111827]">
                        Aksesoris
                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">
                        Pelengkap Outfit
                    </p>
                </a>
            </div>
        </div>

        {{-- Bagian Flash Sale --}}
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <div class="space-y-1">
                    <span class="text-[9px] uppercase tracking-widest text-rose-500 font-bold animate-pulse">Limited
                        Opportunity</span>
                    <h2 class="text-lg md:text-xl font-medium tracking-wide text-[#000000]">Flash Sale</h2>
                </div>
                <a href="{{ route('products.index') }}"
                    class="text-xs uppercase tracking-widest text-[#000000] hover:text-[#6B7280] transition duration-300 font-medium border-b border-[#D4AF37]/20 pb-0.5">
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
                <h2 class="text-lg md:text-xl font-medium tracking-wide text-[#000000]">Rekomendasi Untuk Kamu</h2>
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
                <h2 class="text-lg md:text-xl font-medium tracking-wide text-[#000000]">Produk Terbaru</h2>
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
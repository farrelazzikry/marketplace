@extends('layout.user')

@section('content')
    <div class="space-y-10">

        {{-- Header Judul Koleksi --}}
        <div class="relative pb-6 border-b border-zinc-900/60">
            <p class="text-[10px] uppercase tracking-[0.3em] text-[#D4AF37] font-semibold mb-1">Our Collection</p>
            <h1 class="text-2xl font-light tracking-tight text-white font-serif-luxury">Semua Produk</h1>
        </div>

        {{-- Grid Produk --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 items-stretch">
            @foreach ($products as $product)
                <x-user.product.product-card :id="$product['id']" :image="$product['image']" :name="$product['name']"
                    :price="$product['price']" :discount="$product['discount_price'] ?? null" />
            @endforeach
        </div>

    </div>
@endsection
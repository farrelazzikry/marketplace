@extends('layout.user')

@section('content')

    <div class="container mx-auto space-y-10">

        {{-- 👋 Greeting --}}
        <div>
            <h1 class="text-3xl">
                Selamat Datang Di Calvera ID
            </h1>
            <p class="text-gray-400 mt-1">
                Temukan produk terbaik pilihan untuk kamu hari ini
            </p>
        </div>

        {{-- Flash Sale --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl">Flash Sale</h2>
                <a href="{{ route('login') }}" class="text-sm text-yellow-500">
                    Lihat Semua
                </a>
            </div>

            <div class="flex gap-4 overflow-x-auto pb-2">

                @foreach ($flashSale as $product)
                    <div class="min-w-[200px]">
                        <x-user.product.product-card :id="$product['id']" :image="$product['image']" :name="$product['name']"
                            :price="$product['price']" />
                    </div>
                @endforeach

            </div>
        </div>

        {{-- 🎯 Rekomendasi --}}
        <div>
            <h2 class="text-xl mb-4">Produk Terbaru</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                @foreach ($latest as $product)
                    <x-user.product.product-card :id="$product['id']" :image="$product['image']" :name="$product['name']"
                        :price="$product['price']" />
                @endforeach

            </div>
        </div>

    </div>

@endsection
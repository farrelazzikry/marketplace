@extends('layout.user')

@section('content')

    <h1 class="text-3xl font-bold mb-8">
        Selamat Datang di Calvera ID
    </h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @foreach ($products as $product)
            <x-user.product.product-card :id="$product['id']" :image="$product['image']" :name="$product['name']"
                :price="$product['price']" />
        @endforeach

    </div>

@endsection
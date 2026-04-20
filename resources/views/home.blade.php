@extends('layout.user')

@section('content')

    <h1 class="text-3xl font-bold mb-8">
        Selamat Datang di Calvera ID
    </h1>

    <div class="grid grid-cols-4 gap-6">

        <x-user.product-card image="https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg" name="Hoodie"
            price="Rp 350.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg" name="T-Shirt"
            price="Rp 180.000" />

    </div>

@endsection
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

        <x-user.product-card image="https://i.pinimg.com/736x/6b/91/3e/6b913e0a0c0b5f7e0c72a8a1b3f0f6a3.jpg"
            name="Jersey Bola" price="Rp 250.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/3a/2e/4b/3a2e4b8d7f4c0c3f0c1e9c2d5a1b2c3d.jpg"
            name="Hoodie Oversize" price="Rp 320.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/5c/4f/1a/5c4f1a8b7e2c9d0f3a4b5c6d7e8f9a0b.jpg"
            name="Celana Cargo" price="Rp 275.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/8d/1b/2c/8d1b2c3e4f5a6b7c8d9e0f1a2b3c4d5e.jpg"
            name="Jaket Denim" price="Rp 350.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/1a/9c/7e/1a9c7e6b5f4d3c2b1a0e9d8c7b6a5f4e.jpg"
            name="Sweater Rajut" price="Rp 290.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/7f/3d/2a/7f3d2a1b0c9e8d7c6b5a4f3e2d1c0b9a.jpg"
            name="Boxer Pria" price="Rp 95.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/2b/6a/9c/2b6a9c8d7e5f4c3b2a1d0e9f8c7b6a5d.jpg"
            name="Celana Jeans Slim Fit" price="Rp 310.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/9e/4c/1f/9e4c1f2b3a5d6c7e8f9a0b1c2d3e4f5a.jpg"
            name="Jaket Parasut" price="Rp 330.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/4d/8b/2c/4d8b2c1a0f9e7d6c5b4a3e2d1c0b9a8f.jpg"
            name="Kemeja Flanel" price="Rp 220.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/0f/3a/7b/0f3a7b6c5d4e3f2a1b0c9d8e7f6a5b4c.jpg"
            name="Training Set" price="Rp 400.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/6c/2e/1a/6c2e1a9b8d7f5e4c3b2a1d0f9e8c7b6a.jpg"
            name="Topi Snapback" price="Rp 120.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/3f/7b/2c/3f7b2c1a9d8e6f5c4b3a2d1e0f9c8b7a.jpg"
            name="Kaos Polo" price="Rp 180.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/5a/1c/9e/5a1c9e8d7f6b5c4a3e2d1f0c9b8a7d6c.jpg"
            name="Celana Pendek Sport" price="Rp 150.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/8b/2d/4f/8b2d4f6a7c9e0b1d2f3a4c5e6d7b8a9c.jpg"
            name="Jaket Varsity" price="Rp 370.000" />

        <x-user.product-card image="https://i.pinimg.com/736x/1c/5e/7a/1c5e7a9b8d6f4c3b2a1e0d9c8b7a6f5e.jpg"
            name="Kemeja Linen" price="Rp 260.000" />
    </div>

@endsection
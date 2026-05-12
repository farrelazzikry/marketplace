@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Dashboard" subtitle="Ringkasan sistem" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Total Produk -->
        <x-admin.ui.card title="Total Produk" value="120">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </x-admin.ui.card>

        <!-- Total Pesanan -->
        <x-admin.ui.card title="Total Pesanan" value="450">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
        </x-admin.ui.card>

        <!-- Pesanan Pending -->
        <x-admin.ui.card title="Pesanan Pending" value="12">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-admin.ui.card>

        <!-- Pembayaran Pending -->
        <x-admin.ui.card title="Pembayaran Pending" value="5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
        </x-admin.ui.card>

    </div>

@endsection
@extends('layout.admin')

@section('content')

    <x-admin.page-header title="Dashboard" subtitle="Ringkasan sistem" />

    <div class="grid grid-cols-3 gap-6">

        <x-admin.card title="Total Produk" value="20" />
        <x-admin.card title="Pesanan" value="15" />
        <x-admin.card title="Pembayaran Pending" value="5" />

    </div>

@endsection
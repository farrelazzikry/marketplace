@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Dashboard" subtitle="Ringkasan sistem" />

    <div class="grid grid-cols-3 gap-6">

        <x-admin.ui.card title="Total Produk" value="10" />
        <x-admin.ui.card title="Pesanan" value="20" />
        <x-admin.ui.card title="Pembayaran Pending" value="1" />

    </div>

@endsection
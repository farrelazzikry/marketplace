<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="{{ asset('dist/output.css') }}" rel="stylesheet">
</head>
<body class="bg-primary text-white">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-black p-5">
        <h1 class="text-xl mb-6">Admin Panel</h1>

        <ul class="space-y-3">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/produk">Produk</a></li>
            <li><a href="/admin/pesanan">Pesanan</a></li>
        </ul>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl mb-4">Dashboard</h2>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-secondary text-black p-4 rounded">Total Produk</div>
            <div class="bg-secondary text-black p-4 rounded">Pesanan</div>
            <div class="bg-secondary text-black p-4 rounded">Pendapatan</div>
        </div>
    </main>

</div>

</body>
</html>
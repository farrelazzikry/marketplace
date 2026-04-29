@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Produk" subtitle="Daftar Produk" />

    <div class="flex justify-between items-center mb-6">
        <a href="#" class="text-sm text-gray-400">
            <x-admin.ui.button type="primary">+ Tambah Produk</x-admin.ui.button>
        </a>
    </div>

    <x-admin.ui.table>

        {{-- HEAD --}}
        <x-slot:head>
            <tr class="border-b border-[#2A2A2A] text-gray-300">
                <th class="py-3">Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Size</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            {{-- BODY --}}
            <x-slot:body>

                @foreach ($products as $product)
                    <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">

                        {{-- IMAGE --}}
                        <td class="py-3">
                            <img src="{{ $product['image'] }}" class="w-14 h-14 object-cover rounded-lg border border-gray-700">
                        </td>

                        {{-- NAME --}}
                        <td class="font-semibold">
                            {{ $product['name'] }}
                        </td>

                        {{-- CATEGORY --}}
                        <td>
                            {{ $categories[$product['category_id']]['name'] ?? '-' }}
                        </td>

                        {{-- SIZE --}}
                        <td>
                            {{ $product['size'] }}
                        </td>

                        {{-- PRICE --}}
                        <td>
                            {{ $product['price'] }}
                        </td>

                        {{-- ACTION --}}
                        <td class="text-center space-x-2">

                            <a href="#">
                                <x-admin.ui.button type="edit">Edit</x-admin.ui.button>
                            </a>

                            <x-admin.ui.button type="delete">Hapus</x-admin.ui.button>

                        </td>

                    </tr>
                @endforeach


                </x-slot>

    </x-admin.ui.table>

@endsection
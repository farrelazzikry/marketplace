@extends('layout.admin')

@section('content')
    <div x-data="{ 
        openModal: false, 
        editOpen: false, 
        editProduct: {id: '', name: '', price: '', category_id: '', size: '', desc: ''} 
    }">

        <x-admin.layout.page-header title="Produk" subtitle="Daftar Produk" />

        <div class="flex justify-between items-center mb-6">
            <x-admin.ui.button type="primary" @click="openModal = true">
                + Tambah Produk
            </x-admin.ui.button>
        </div>

        <x-admin.ui.table>
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

                <x-slot:body>
                    @foreach ($products as $product)
                        <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">
                            <td class="py-3">
                                <img src="{{ $product['image'] }}"
                                    class="w-14 h-14 object-cover rounded-lg border border-gray-700">
                            </td>
                            <td class="font-semibold">{{ $product['name'] }}</td>
                            <td>{{ $categories[$product['category_id']]['name'] ?? '-' }}</td>
                            <td>{{ $product['size'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <x-admin.ui.button type="edit" @click="
                                        editOpen = true; 
                                        editProduct = {
                                            id: '{{ $product['id'] }}', 
                                            name: '{{ $product['name'] }}', 
                                            price: '{{ preg_replace('/[^0-9]/', '', $product['price']) }}', 
                                            category_id: '{{ $product['category_id'] }}', 
                                            size: '{{ $product['size'] }}'
                                        }">
                                        Edit
                                    </x-admin.ui.button>

                                    <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-admin.ui.button type="delete"
                                            onclick="return confirm('Hapus?')">Hapus</x-admin.ui.button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </x-slot>
        </x-admin.ui.table>

        {{-- MANGGIL KOMPONEN MODAL --}}
        <x-admin.ui.modal-add :categories="$categories" />
        <x-admin.ui.modal-edit :categories="$categories" />

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection
@extends('layout.admin')

@section('content')

    <div x-data="{
                    openModal: false,
                    editOpen: false,

                    editProduct: {
                        id: '',
                        name: '',
                        price: '',
                        discount_price: '',
                        category: '',
                        size: '',
                        desc: '',
                        stock: ''
                    }
                }">

        <x-admin.layout.page-header title="Produk" subtitle="Daftar Produk" />

        <div class="flex justify-between items-center mb-6">
            <x-admin.ui.button type="primary" @click="openModal = true">
                + Tambah Produk
            </x-admin.ui.button>
        </div>

        <x-admin.ui.table>

            <x-slot:head>
                <tr class="border-b border-[#E5E7EB]">
                    <th class="py-3 text-left">Gambar</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Kategori</th>
                    <th class="text-left">Size</th>
                    <th class="text-left">Stock</th>
                    <th class="text-left">Harga</th>
                    <th class="text-left">Diskon</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </x-slot>

                <x-slot:body>
                    @foreach ($products as $product)
                        <tr class="border-b border-[#E5E7EB]">
                            <td class="py-3">
                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                    class="w-14 h-14 object-cover rounded-lg border border-[#E5E7EB]">
                            </td>
                            <td class="font-semibold text-[#000000]">{{ $product->name }}</td>
                            <td class="text-[#000000]">{{ $product->category }}</td>
                            <td class="text-[#000000]">{{ $product->size }}</td>
                            <td class="text-[#000000]">{{ $product->stock }}</td>
                            <td class="text-[#000000]">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="text-[#000000]">
                                @if($product->discount_price)
                                    Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <x-admin.ui.button type="edit" @click="
                                            editOpen = true;
                                            editProduct = {
                                                id: '{{ $product->id }}',
                                                name: '{{ $product->name }}',
                                                price: '{{ $product->price }}',
                                                discount_price: '{{ $product->discount_price }}',
                                                category: '{{ $product->category }}',
                                                size: '{{ $product->size }}',
                                                desc: `{{ $product->description }}`,
                                                stock: '{{ $product->stock }}'
                                            }
                                        ">
                                        Edit
                                    </x-admin.ui.button>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-admin.ui.button type="delete" onclick="return confirm('Hapus produk ini?')">
                                            Hapus
                                        </x-admin.ui.button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </x-slot>

        </x-admin.ui.table>

        {{-- MODALS --}}
        <x-admin.ui.modal-add :categories="$categories" />
        <x-admin.ui.modal-edit :categories="$categories" />

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

@endsection
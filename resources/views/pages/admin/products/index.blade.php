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

                <tr class="border-b border-[#2A2A2A] text-gray-300">

                    <th class="py-3">Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th class="text-center">Aksi</th>

                </tr>

                </x-slot>

                <x-slot:body>

                    @foreach ($products as $product)

                        <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">

                            <td class="py-3">

                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                    class="w-14 h-14 object-cover rounded-lg border border-gray-700">

                            </td>

                            <td class="font-semibold">
                                {{ $product->name }}
                            </td>

                            <td>
                                {{ $product->category }}
                            </td>

                            <td>
                                {{ $product->size }}
                            </td>

                            <td>
                                {{ $product->stock }}
                            </td>

                            <td>
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td>

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
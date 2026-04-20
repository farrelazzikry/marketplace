@extends('layout.admin')

@section('content')

    <x-admin.page-header title="Produk" />

    <div class="flex justify-between items-center mb-6">

        <x-admin.button type="primary">+ Tambah Produk</x-admin.button>

    </div>

    <x-admin.table>

        <x-slot:head>
            <tr class="border-b border-[#2A2A2A] text-gray-300">
                <th class="py-3">Nama</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>

                <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">
                    <td class="py-3">Hoodie</td>
                    <td>Rp 350.000</td>
                    <td class="text-center">

                        <x-admin.button type="edit">Edit</x-admin.button>
                        <x-admin.button type="delete">Hapus</x-admin.button>

                    </td>
                </tr>

                </x-slot>

    </x-admin.table>

@endsection
@extends('layout.admin')

@section('content')

    <x-admin.page-header title="Pesanan" />

    <x-admin.table>

        <x-slot:head>
            <tr>
                <th>User</th>
                <th>Status</th>
                <th>Total</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>

                <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">

                    <td>Farrel</td>

                    <td>
                        <x-admin.status type="pending">Pending</x-admin.status>
                    </td>

                    <td>Rp 350.000</td>

                    <td class="text-center">

                        <x-admin.button type="primary">Proses</x-admin.button>

                    </td>

                </tr>

                </x-slot>

    </x-admin.table>

@endsection
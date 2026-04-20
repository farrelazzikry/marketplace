@extends('layout.admin')

@section('content')

    <x-admin.page-header title="Pembayaran" />

    <x-admin.table>

        <x-slot:head>
            <tr class="text-gray-400 border-b border-gray-700">
                <th>User</th>
                <th>Bukti</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>

                @foreach($pembayaran as $item)

                    <tr class="border-b border-gray-800 hover:bg-[#222] transition">

                        <td class="py-4 font-semibold">
                            {{ $item['user'] }}
                        </td>

                        <td>
                            <img src="/images/{{ $item['bukti'] }}"
                                class="w-14 h-14 object-cover rounded-lg border border-gray-700">
                        </td>

                        <td>
                            <x-admin.status type="{{ strtolower($item['status']) }}">
                                {{ $item['status'] }}
                            </x-admin.status>
                        </td>

                        <td class="text-center space-x-2">

                            <x-admin.button type="verify">Verifikasi</x-admin.button>
                            <x-admin.button type="reject">Tolak</x-admin.button>

                        </td>

                    </tr>

                @endforeach

                </x-slot>

    </x-admin.table>

@endsection
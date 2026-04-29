@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Pembayaran" subtitle="Ringkasan Pembayaran" />

    <x-admin.ui.table>

        <x-slot:head>
            <tr class="text-gray-400 border-b border-gray-700">
                <th>User</th>
                <th>Bukti</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>

                @foreach($pembayaran as $id => $item)
                    <tr class="border-b border-gray-800 hover:bg-[#222] transition">

                        <td class="py-4 font-semibold">
                            {{ $item['user'] }}
                        </td>

                        <td>
                            <img src="/images/{{ $item['bukti'] }}"
                                class="w-14 h-14 object-cover rounded-lg border border-gray-700">
                        </td>

                        <td>
                            <x-admin.ui.status type="{{ strtolower($item['status']) }}">
                                {{ $item['status'] }}
                            </x-admin.ui.status>
                        </td>

                        <td class="text-center space-x-2">

                            @if(strtolower($item['status']) === 'menunggu')

                                {{-- VERIF --}}
                                <a href="{{ route('admin.payments.verify', $id) }}">
                                    <x-admin.ui.button type="verify">Verifikasi</x-admin.ui.button>
                                </a>

                                {{-- TOLAK --}}
                                <a href="{{ route('admin.payments.reject', $id) }}">
                                    <x-admin.ui.button type="reject">Tolak</x-admin.ui.button>
                                </a>

                            @else
                                <span class="text-gray-500 text-sm italic">
                                    Selesai
                                </span>
                            @endif

                        </td>

                    </tr>
                @endforeach

                </x-slot>

    </x-admin.ui.table>

@endsection
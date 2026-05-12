@extends('layout.admin')

@section('content')
    <div x-data="{ showModal: false, imgSource: '' }"> <!-- Wrapper Alpine.js -->

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
                            <td class="py-4 font-semibold">{{ $item['user'] }}</td>

                            <td>
                                {{-- Trigger Klik --}}
                                {{-- Menggunakan helper asset() --}}
                                <img src="{{ asset('images/' . $item['bukti']) }}"
                                    @click="imgSource = '{{ asset('images/' . $item['bukti']) }}'; showModal = true"
                                    class="w-14 h-14 object-cover rounded-lg border border-gray-700 cursor-zoom-in"
                                    alt="Bukti Pembayaran">
                            </td>

                            <td>
                                <x-admin.ui.status type="{{ strtolower($item['status']) }}">
                                    {{ $item['status'] }}
                                </x-admin.ui.status>
                            </td>

                            <td class="text-center space-x-2">
                                @if(strtolower($item['status']) === 'menunggu')
                                    <a href="{{ route('admin.payments.verify', $id) }}">
                                        <x-admin.ui.button type="verify">Verifikasi</x-admin.ui.button>
                                    </a>
                                    <a href="{{ route('admin.payments.reject', $id) }}">
                                        <x-admin.ui.button type="reject">Tolak</x-admin.ui.button>
                                    </a>
                                @else
                                    <span class="text-gray-500 text-sm italic">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </x-slot>
        </x-admin.ui.table>

        <!-- MODAL OVERLAY -->
        <template x-teleport="body">
            <div x-show="showModal" x-transition.opacity
                class="fixed inset-0 z-[99] flex items-center justify-center bg-black/90 p-5" @click="showModal = false"
                @keydown.escape.window="showModal = false" style="display: none;">

                {{-- Tombol Close --}}
                <button class="absolute top-5 right-5 text-white text-3xl">&times;</button>

                {{-- Gambar --}}
                <img :src="imgSource" class="max-w-full max-h-full rounded-lg shadow-2xl border border-gray-800"
                    @click.stop>
            </div>
        </template>

    </div>
@endsection
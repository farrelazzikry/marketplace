@extends('layout.admin')

@section('content')

    <div x-data="{ showModal: false, imgSource: '' }">

        <x-admin.layout.page-header title="Pembayaran" subtitle="Verifikasi Pembayaran User" />

        <x-admin.ui.table>

            <x-slot:head>

                <tr class="border-b border-[#2A2A2A] text-gray-300">
                    <th>User</th>
                    <th>Order</th>
                    <th>Metode</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>

                </x-slot>

                <x-slot:body>

                    @forelse($payments as $payment)

                        <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">

                            <td class="py-4 font-semibold text-white">
                                {{ $payment->user->name }}
                            </td>

                            <td class="text-blue-400 font-mono">
                                #{{ $payment->id }}
                            </td>

                            <td class="uppercase text-gray-300">
                                {{ $payment->payment_method }}
                            </td>

                            <td>

                                <img src="{{ asset('uploads/payments/' . $payment->proof_of_payment) }}" @click="
                                            imgSource = '{{ asset('uploads/payments/' . $payment->proof_of_payment) }}';
                                            showModal = true
                                        " class="w-16 h-16 object-cover rounded-xl border border-gray-700 cursor-pointer">

                            </td>

                            <td>
                                <x-status :status="$payment->payment_status" />
                            </td>

                            <td class="text-center">

                                @if($payment->payment_status == 'waiting_verification')

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('admin.payments.verify', $payment->id) }}">

                                            <x-admin.ui.button type="verify">
                                                Verifikasi
                                            </x-admin.ui.button>

                                        </a>

                                        <a href="{{ route('admin.payments.reject', $payment->id) }}">

                                            <x-admin.ui.button type="reject">
                                                Tolak
                                            </x-admin.ui.button>

                                        </a>

                                    </div>

                                @else

                                    <span class="text-sm text-gray-500 italic">
                                        Selesai
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-500">
                                Belum ada pembayaran
                            </td>
                        </tr>

                    @endforelse

                    </x-slot>

        </x-admin.ui.table>

        {{-- MODAL IMAGE --}}
        <template x-teleport="body">

            <div x-show="showModal" x-transition.opacity
                class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-10" style="display: none;"
                @click="showModal = false">

                <button class="absolute top-5 right-5 text-white text-4xl">
                    &times;
                </button>

                <img :src="imgSource" class="max-w-full max-h-full rounded-2xl border border-zinc-800 shadow-2xl"
                    @click.stop>

            </div>

        </template>

    </div>

@endsection
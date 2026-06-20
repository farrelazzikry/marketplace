@extends('layout.admin')

@section('content')

    <div x-data="{ showModal: false, imgSource: '' }">

        <x-admin.layout.page-header title="Pembayaran" subtitle="Verifikasi Pembayaran User" />

        <x-admin.ui.table>

            <x-slot:head>
                <tr class="border-b border-[#E5E7EB]">
                    <th class="text-left">User</th>
                    <th class="text-left">Order</th>
                    <th class="text-left">Metode</th>
                    <th class="text-left">Bukti</th>
                    <th class="text-left">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </x-slot>

                <x-slot:body>
                    @forelse($payments as $payment)
                        <tr class="border-b border-[#E5E7EB]">
                            <td class="py-4 font-semibold text-[#000000]">{{ $payment->user->name }}</td>
                            <td class="font-mono text-[#000000]">#{{ $payment->id }}</td>
                            <td class="uppercase text-[#000000]">{{ $payment->payment_method }}</td>
                            <td>
                                <img src="{{ asset('uploads/payments/' . $payment->proof_of_payment) }}"
                                    @click="imgSource = '{{ asset('uploads/payments/' . $payment->proof_of_payment) }}'; showModal = true"
                                    class="w-16 h-16 object-cover rounded-xl border border-[#E5E7EB] cursor-pointer">
                            </td>
                            <td><x-status :status="$payment->payment_status" /></td>
                            <td class="text-center">
                                @if($payment->payment_status == 'waiting_verification')
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.payments.verify', $payment->id) }}">
                                            <x-admin.ui.button type="verify">Verifikasi</x-admin.ui.button>
                                        </a>
                                        <a href="{{ route('admin.payments.reject', $payment->id) }}">
                                            <x-admin.ui.button type="reject">Tolak</x-admin.ui.button>
                                        </a>
                                    </div>
                                @else
                                    <span class="text-sm text-[#000000] italic">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-[#000000]">Belum ada pembayaran</td>
                        </tr>
                    @endforelse
                    </x-slot>

        </x-admin.ui.table>

        {{-- MODAL IMAGE --}}
        <template x-teleport="body">
            <div x-show="showModal" x-transition.opacity
                class="fixed inset-0 bg-[#FFFFFF]/90 z-50 flex items-center justify-center p-10" style="display: none;"
                @click="showModal = false">
                <button class="absolute top-5 right-5 text-[#000000] text-4xl">&times;</button>
                <img :src="imgSource" class="max-w-full max-h-full rounded-2xl border border-[#E5E7EB] shadow-2xl"
                    @click.stop>
            </div>
        </template>

    </div>

@endsection
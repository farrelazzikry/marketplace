@extends('layout.user')

@section('content')
    <div class="max-w-2xl mx-auto text-center py-20">
        <div class="bg-white p-10 rounded-2xl border border-[#E5E7EB] shadow-xl">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-[#111827] mb-4">Pembayaran Berhasil! 🎉</h1>
            <p class="text-zinc-500 mb-8">Pesanan Anda telah kami terima dan sedang diproses.</p>
            <a href="{{ route('user.orders') }}"
                class="inline-block bg-[#111827] hover:bg-[#1F2937] text-white px-8 py-3 rounded-xl font-semibold transition">
                Lihat Pesanan Saya
            </a>
        </div>
    </div>
@endsection
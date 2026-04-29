@props(['id'])

<div id="{{ $id }}" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-[#1A1A1A] w-full max-w-lg rounded-xl p-6 shadow-lg relative">

        {{-- CLOSE BUTTON --}}
        <button onclick="closeModal('{{ $id }}')" class="absolute top-3 right-3 text-gray-400 hover:text-white">
            ✕
        </button>

        {{-- CONTENT --}}
        {{ $slot }}

    </div>
</div>
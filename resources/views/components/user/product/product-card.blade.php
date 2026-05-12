@props(['id', 'image', 'name', 'price'])

<div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg 
            hover:shadow-2xl hover:-translate-y-1 transition duration-300 group border border-gray-800">

    {{-- LINK KE DETAIL --}}
    <a href="{{ route('user.products.show', $id) }}" class="block">

        <!-- IMAGE -->
        <div class="overflow-hidden">
            <img src="{{ $image }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-300">
        </div>

        <!-- CONTENT -->
        <div class="p-4">
            <h2 class="font-semibold text-lg text-white">
                {{ $name }}
            </h2>

            <p class="text-gray-400 font-medium">{{ $price }}</p>

            <span class="text-sm text-indigo-400 group-hover:text-indigo-300 mt-2 block transition">
                Lihat Detail →
            </span>
        </div>

    </a>

    {{-- BUTTON DENGAN IKON --}}
    <div class="p-4 pt-0">
        <button class="mt-3 w-full bg-gray-200 text-black py-2.5 rounded-lg 
                       hover:bg-white transition flex items-center justify-center gap-2 font-semibold text-sm">

            {{-- IKON KERANJANG --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="8" cy="21" r="1" />
                <circle cx="19" cy="21" r="1" />
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>

            Tambah ke Keranjang
        </button>
    </div>

</div>
@props(['id', 'image', 'name', 'price'])

<div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg 
            hover:shadow-2xl hover:-translate-y-1 transition duration-300 group">

    {{-- LINK KE DETAIL --}}
    <a href="{{ route('user.products.show', $id) }}" class="block">

        <!-- IMAGE -->
        <div class="overflow-hidden">
            <img src="{{ $image }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-300">
        </div>

        <!-- CONTENT -->
        <div class="p-4">
            <h2 class="font-semibold text-lg">
                {{ $name }}
            </h2>

            <p class="text-gray-400">{{ $price }}</p>

            <span class="text-sm text-gray-400 hover:text-white">
                Lihat Detail →
            </span>
        </div>

    </a>

    {{-- BUTTON --}}
    <div class="p-4 pt-0">
        <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg 
                       hover:bg-white transition">
            Tambah ke Keranjang
        </button>
    </div>

</div>
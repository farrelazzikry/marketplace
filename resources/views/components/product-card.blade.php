<div class="bg-[#1A1A1A] rounded-xl overflow-hidden shadow-lg 
            hover:shadow-2xl hover:-translate-y-1 transition duration-300 group">

    <!-- IMAGE -->
    <div class="overflow-hidden">
        <img src="{{ $image }}" class="w-full h-60 object-cover ">
    </div>

    <!-- CONTENT -->
    <div class="p-4">
        <h2 class="font-semibold text-lg transition">
            {{ $name }}
        </h2>

        <p class="text-gray-400">{{ $price }}</p>
        <a href="#" class="text-sm text-gray-400 hover:text-white">
            Lihat Detail →
        </a>

        <button class="mt-3 w-full bg-gray-300 text-black py-2 rounded-lg 
                       hover:bg-white transition">
            Tambah ke Keranjang
        </button>
    </div>

</div>
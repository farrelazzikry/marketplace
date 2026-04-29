<div class="flex items-center justify-between p-4 bg-gray-900 border border-gray-800 rounded-xl">

    <div class="flex items-center gap-4">
        <img src="{{ $image }}" class="w-20 h-20 rounded-lg object-cover">

        <div>
            <h3 class="font-semibold text-lg">{{ $name }}</h3>
            <p class="text-gray-400 text-sm">Varian: {{ $variant }}</p>
            <p class="text-white font-bold mt-1">{{ $price }}</p>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="flex items-center border border-gray-700 rounded-lg overflow-hidden">
            <button class="px-3 py-1 bg-gray-800 hover:bg-gray-700">-</button>
            <span class="px-4 py-1 bg-black">{{ $qty }}</span>
            <button class="px-3 py-1 bg-gray-800 hover:bg-gray-700">+</button>
        </div>

        <button class="text-red-500 hover:text-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>

</div>
@props(['title', 'value', 'color' => 'gray'])

<div
    class="bg-[#0A0A0A] p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-800 hover:border-gray-600 transition-all duration-500 group relative overflow-hidden">
    <div class="flex items-center justify-between relative z-10">
        <div>
            <h2 class="text-gray-500 text-[10px] md:text-xs font-medium uppercase tracking-[0.2em]">
                {{ $title }}
            </h2>
            <p class="text-2xl md:text-4xl font-bold mt-2 md:mt-3 text-white tracking-tight">
                {{ $value }}
            </p>
        </div>

        <div
            class="w-12 h-12 md:w-16 md:h-16 bg-gray-900 rounded-xl md:rounded-2xl flex items-center justify-center border border-gray-800 group-hover:scale-110 group-hover:border-gray-700 transition-all duration-500">
            <div class="text-gray-400 group-hover:text-white transition-colors scale-90 md:scale-100">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- Efek Cahaya (Ukuran disesuaikan mobile) -->
    <div
        class="absolute -right-8 -bottom-8 w-24 h-24 md:w-40 md:h-40 bg-{{ $color }}-500/5 rounded-full blur-[60px] group-hover:bg-{{ $color }}-500/10 transition-all duration-700">
    </div>
</div>
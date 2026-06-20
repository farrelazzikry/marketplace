@props(['title', 'value'])

<div
    class="bg-[#FFFFFF] p-6 md:p-8 rounded-2xl md:rounded-3xl border border-[#E5E7EB] hover:border-[#D1D5DB] transition-all duration-500 group relative overflow-hidden">
    <div class="flex items-center justify-between relative z-10">
        <div>
            <h2 class="text-[#6B7280] text-[10px] md:text-xs font-medium uppercase tracking-[0.2em]">
                {{ $title }}
            </h2>
            <p class="text-2xl md:text-4xl font-bold mt-2 md:mt-3 text-[#111827] tracking-tight">
                {{ $value }}
            </p>
        </div>

        <div
            class="w-12 h-12 md:w-16 md:h-16 bg-[#F3F4F6] rounded-xl md:rounded-2xl flex items-center justify-center border border-[#E5E7EB] group-hover:scale-110 group-hover:border-[#CCCCCC] transition-all duration-500">
            <div class="text-[#474747] group-hover:text-[#000000] transition-colors scale-90 md:scale-100">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- Efek cahaya abu-abu -->
    <div
        class="absolute -right-8 -bottom-8 w-24 h-24 md:w-40 md:h-40 bg-gray-300/20 rounded-full blur-[60px] group-hover:bg-gray-400/20 transition-all duration-700">
    </div>
</div>
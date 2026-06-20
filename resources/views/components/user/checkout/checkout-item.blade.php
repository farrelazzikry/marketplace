@props(['name', 'variant', 'price', 'size' => '-'])

<div class="flex justify-between items-center border-b border-[#CCCCCC] pb-4 last:border-0 last:pb-0">
    <div>
        <h3 class="font-semibold text-[#000000] text-sm tracking-wide">{{ $name }}</h3>
        <div class="flex items-center gap-2 mt-1 text-xs text-zinc-500 font-medium">
            <span>{{ $variant }}</span>
            <span class="text-zinc-700">•</span>
            <span>Ukuran: <span class="text-zinc-400 font-semibold uppercase">{{ $size }}</span></span>
        </div>
    </div>
    <span class="font-bold text-sm text-[#111827] tracking-wide">{{ $price }}</span>
</div>
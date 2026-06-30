@props(['name', 'variant', 'price', 'size' => '-'])

<<<<<<< HEAD
<div class="flex justify-between items-center border-b border-zinc-900 pb-4 last:border-0 last:pb-0">
    <div>
        <h3 class="font-semibold text-zinc-200 text-sm tracking-wide">{{ $name }}</h3>
=======
<div class="flex justify-between items-center border-b border-[#CCCCCC] pb-4 last:border-0 last:pb-0">
    <div>
        <h3 class="font-semibold text-[#000000] text-sm tracking-wide">{{ $name }}</h3>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        <div class="flex items-center gap-2 mt-1 text-xs text-zinc-500 font-medium">
            <span>{{ $variant }}</span>
            <span class="text-zinc-700">•</span>
            <span>Ukuran: <span class="text-zinc-400 font-semibold uppercase">{{ $size }}</span></span>
        </div>
    </div>
<<<<<<< HEAD
    <span class="font-bold text-sm text-[#D4AF37] tracking-wide">{{ $price }}</span>
=======
    <span class="font-bold text-sm text-[#111827] tracking-wide">{{ $price }}</span>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
</div>
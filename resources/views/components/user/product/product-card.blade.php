@props([
    'id',
    'image',
    'name',
    'price',
    'discount' => null
])

@php
    // Menghitung otomatis persentase diskon jika ada harga diskon
    $discountPercentage = 0;
    if ($discount && $price > 0) {
        $discountPercentage = round((($price - $discount) / $price) * 100);
    }
@endphp

<div class="bg-zinc-950/40 rounded-2xl overflow-hidden border border-zinc-900/80 hover:border-[#D4AF37]/40 shadow-xl transition-all duration-500 group h-full flex flex-col relative">
    
    {{-- BADGE DISKON MEWAH --}}
    @if($discount && $discountPercentage > 0)
        <div class="absolute top-3 left-3 z-10 bg-[#D4AF37] text-black text-[9px] tracking-widest font-bold uppercase px-2.5 py-1 rounded-full shadow-lg">
            {{ $discountPercentage }}% OFF
        </div>
    @endif

    {{-- LINK DETAIL --}}
    <a href="{{ route('products.show', $id) }}" class="flex flex-col h-full flex-grow">

        {{-- BINGKAI FOTO + EFEK ZOOM SLIGHT --}}
        <div class="w-full h-56 md:h-72 overflow-hidden bg-zinc-900/20 shrink-0 relative">
            <img src="{{ asset('uploads/products/' . $image) }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- AREA SPESIFIKASI PRODUK --}}
        <div class="p-4 flex flex-col flex-grow justify-between bg-gradient-to-b from-transparent to-zinc-950/20">
            <div>
                {{-- NAMA PRODUK ELEGAN --}}
                <h2 class="font-medium text-xs md:text-sm text-zinc-300 group-hover:text-white transition-colors duration-300 line-clamp-2 tracking-wide leading-relaxed">
                    {{ $name }}
                </h2>

                {{-- HARGA STYLISH --}}
                <div class="mt-3">
                    @if($discount)
                        <div class="flex flex-col gap-0.5">
                            <span class="text-zinc-600 line-through text-[10px] md:text-xs tracking-wide">
                                IDR {{ number_format($price, 0, ',', '.') }}
                            </span>
                            <span class="text-[#D4AF37] font-semibold text-xs md:text-sm tracking-wider">
                                IDR {{ number_format($discount, 0, ',', '.') }}
                            </span>
                        </div>
                    @else
                        <span class="text-zinc-400 font-medium text-xs md:text-sm tracking-wider">
                            IDR {{ number_format($price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- TOMBOL CALL TO ACTION TRANSITION --}}
            <div class="mt-5 pt-3 border-t border-zinc-900/60 flex items-center justify-between text-[10px] uppercase tracking-widest text-zinc-500 group-hover:text-[#D4AF37] transition-colors duration-300">
                <span>Lihat Detail</span>
                <span class="transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">→</span>
            </div>
        </div>
    </a>
</div>
@props([
    'id',
    'image',
    'name',
    'price',
    'discount' => null,
    'defaultSize' => null // <-- TAMBAHKAN INI
])

@php
    $discountPercentage = 0;
    if ($discount && $price > 0) {
        $discountPercentage = round((($price - $discount) / $price) * 100);
    }
@endphp

<div class="bg-white rounded-2xl overflow-hidden border border-[#E5E7EB] hover:border-[#9CA3AF] shadow-xl transition-all duration-500 group h-full flex flex-col relative">
    
    @if($discount && $discountPercentage > 0)
        <div class="absolute top-3 left-3 z-10 bg-[#111827] text-white text-[9px] tracking-widest font-bold uppercase px-2.5 py-1 rounded-full">
            {{ $discountPercentage }}% OFF
        </div>
    @endif

    <a href="{{ route('products.show', $id) }}" class="flex flex-col h-full flex-grow">

        <div class="w-full h-56 md:h-72 overflow-hidden bg-[#F9FAFB] shrink-0 relative">
            <img src="{{ asset('uploads/products/' . $image) }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        <div class="p-4 flex flex-col flex-grow justify-between bg-gradient-to-b from-transparent to-zinc-950/20">
            <div>
                <h2 class="font-medium text-xs md:text-sm text-[#111827] group-hover:text-[#374151] transition-colors duration-300 line-clamp-2 tracking-wide leading-relaxed">
                    {{ $name }}
                </h2>

                <div class="mt-3">
                    @if($discount)
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[#9CA3AF] line-through text-[10px] md:text-xs tracking-wide">
                                IDR {{ number_format($price, 0, ',', '.') }}
                            </span>
                            <span class="text-[#111827] font-bold text-xs md:text-sm tracking-wider">
                                IDR {{ number_format($discount, 0, ',', '.') }}
                            </span>
                        </div>
                    @else
                        <span class="text-[#111827] font-medium text-xs md:text-sm tracking-wider">
                            IDR {{ number_format($price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="mt-5 pt-3 border-t border-[#E5E7EB] flex items-center justify-between gap-2">
                <a href="{{ route('products.show', $id) }}" 
                    class="text-[10px] uppercase tracking-widest text-[#6B7280] hover:text-[#111827] transition-colors duration-300 flex items-center gap-1">
                    Detail
                    <span class="transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">→</span>
                </a>

                @if(session('is_login') && $defaultSize)
                    {{-- TAMBAH KERANJANG --}}
                    <form action="{{ route('user.cart.add', $id) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="size" value="{{ $defaultSize }}">
                        <button type="submit" 
                            class="text-[10px] uppercase tracking-widest font-bold text-[#6B7280] hover:text-[#111827] transition-colors duration-300 flex items-center gap-1"
                            title="Tambah ke Keranjang">
                            🛒
                        </button>
                    </form>

                    {{-- CHECKOUT LANGSUNG --}}
                    <form action="{{ route('user.checkout.direct', $id) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="size" value="{{ $defaultSize }}">
                        <button type="submit" 
                            class="text-[10px] uppercase tracking-widest font-bold text-[#6B7280] hover:text-[#111827] transition-colors duration-300 flex items-center gap-1"
                            title="Beli Sekarang">
                            ⚡
                        </button>
                    </form>
                @elseif(!session('is_login'))
                    <a href="{{ route('login') }}" class="text-[10px] uppercase tracking-widest text-[#6B7280] hover:text-[#111827] transition-colors">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </a>
</div>
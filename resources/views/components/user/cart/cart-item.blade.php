@props([
    'id',
    'image',
    'name',
    'price',
    'qty',
    'size'
])

<div 
    x-data="{ 
        qty: {{ $qty }}, 
        price: {{ $price }},
        id: '{{ $id }}',
        isLoading: false,

<<<<<<< HEAD
        // Fungsi AJAX untuk sinkronisasi kuantitas ke database
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        async updateDatabase(newQty) {
            this.isLoading = true;
            try {
                let response = await fetch(`/user/cart/update/${this.id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        quantity: newQty
                    })
                });

                if (!response.ok) {
                    console.error('Gagal memperbarui data di server.');
                }
            } catch (error) {
                console.error('Terjadi kesalahan jaringan:', error);
            } finally {
                this.isLoading = false;
            }
        },

        init() {
<<<<<<< HEAD
            // Mengirim data ke halaman induk jika quantity berubah
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            this.$watch('qty', value => {
                this.updateDatabase(value);
                this.$dispatch('cart-qty-updated', { id: this.id, qty: value });
            });
        }
    }"
    :class="isLoading ? 'opacity-60 pointer-events-none' : ''"
<<<<<<< HEAD
    class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 p-4 bg-zinc-900 border border-zinc-800 rounded-2xl hover:border-zinc-700 transition duration-200">

    {{-- LEFT SECTION --}}
    <div class="flex items-center gap-4 flex-1">
        
        {{-- CHECKBOX SELEKSI EMAS --}}
=======
    class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 p-4 bg-[#FFFFFF] border border-[#E0E0E0] rounded-2xl transition duration-200">

    <div class="flex items-center gap-4 flex-1">
        
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        <div class="flex items-center justify-center pl-1">
            <input 
                type="checkbox" 
                value="{{ $id }}"
                x-model="selectedItems"
<<<<<<< HEAD
                class="w-5 h-5 rounded-md bg-zinc-950 border-zinc-700 text-[#D4AF37] focus:ring-[#D4AF37] focus:ring-offset-zinc-900 focus:ring-1 cursor-pointer accent-[#D4AF37]">
        </div>

        {{-- IMAGE --}}
        <img
            src="{{ asset('uploads/products/' . $image) }}"
            class="w-24 h-24 rounded-xl object-cover border border-zinc-800 shrink-0">

        {{-- INFO --}}
        <div class="space-y-1 min-w-0 flex-1">
            <h3 class="font-semibold text-base text-white truncate">
                {{ $name }}
            </h3>

            {{-- SIZE --}}
            <p class="text-xs text-zinc-400">
                Size: <span class="text-white font-medium">{{ $size }}</span>
            </p>

            {{-- PRICE PER ITEM --}}
=======
                class="w-5 h-5 rounded-md bg-zinc-950 border-zinc-700 text-gray-600 focus:ring-gray-600 focus:ring-offset-zinc-900 focus:ring-1 cursor-pointer accent-gray-600">
        </div>

        <img
            src="{{ asset('uploads/products/' . $image) }}"
            class="w-24 h-24 rounded-xl object-cover border border-[#E0E0E0] shrink-0">

        <div class="space-y-1 min-w-0 flex-1">
            <h3 class="font-semibold text-base text-[#000000] truncate">
                {{ $name }}
            </h3>

            <p class="text-xs text-zinc-400">
                Size: <span class="text-[#000000] font-medium">{{ $size }}</span>
            </p>

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            <div class="space-y-0.5">
                <p class="text-sm font-medium text-zinc-400">
                    Rp {{ number_format($price, 0, ',', '.') }}
                </p>
<<<<<<< HEAD
                {{-- Subtotal per baris --}}
                <p class="text-base font-semibold text-white">
=======
                <p class="text-base font-semibold text-[#000000]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                    Subtotal: Rp <span x-text="new Intl.NumberFormat('id-ID').format(price * qty)"></span>
                </p>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    {{-- RIGHT SECTION --}}
    <div class="flex items-center justify-between md:justify-end gap-4 shrink-0">

        {{-- QTY CONTROLLER --}}
        <div class="flex items-center border border-zinc-800 rounded-xl overflow-hidden bg-black">
=======
    <div class="flex items-center justify-between md:justify-end gap-4 shrink-0">

        <div class="flex items-center border border-[#E0E0E0] rounded-xl overflow-hidden bg-[#FFFFFF]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            <button
                type="button"
                @click="if(qty > 1) qty--"
                :disabled="qty <= 1"
<<<<<<< HEAD
                :class="qty <= 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-zinc-900'"
=======
                :class="qty <= 1 ? 'opacity-40 cursor-not-allowed' : 'hover:bg-[#CCCCCC]'"
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                class="px-4 py-2 bg-zinc-950 transition text-zinc-300 select-none font-bold">
                -
            </button>

<<<<<<< HEAD
            <span class="px-4 py-2 text-white font-medium min-w-[45px] text-center select-none text-sm" x-text="qty"></span>
=======
            <span class="px-4 py-2 text-[#000000] font-medium min-w-[45px] text-center select-none text-sm" x-text="qty"></span>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

            <button
                type="button"
                @click="qty++"
<<<<<<< HEAD
                class="px-4 py-2 bg-zinc-950 hover:bg-zinc-900 transition text-zinc-300 select-none font-bold">
=======
                class="px-4 py-2 bg-zinc-950 hover:bg-[#CCCCCC] transition text-zinc-300 select-none font-bold">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                +
            </button>
        </div>

<<<<<<< HEAD
        {{-- DELETE BUTTON --}}
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        <form action="{{ route('user.cart.remove', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                onclick="return confirm('Hapus produk dari keranjang?')"
<<<<<<< HEAD
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 transition">
=======
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#FF0000] hover:bg-[#FF0000]/70 border border-[#FF0000] text-white transition">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </div>
</div>
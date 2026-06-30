@props([
    'title' => 'Ringkasan Pesanan',
    'subtotal' => 0
])

<div x-data="{
        subtotal: {{ $subtotal }},
<<<<<<< HEAD
    shippingCost: 0,
       get total() { return this.subtotal + this.shippingCost; }
     }"
     @update-ongkir.window="shippingCost = $event.detail.cost"
     class="bg-[#111111] border border-zinc-800 rounded-2xl p-6 sticky top-10 text-white shadow-xl">

    <h2 class="text-2xl font-bold mb-6 tracking-wide text-zinc-100">
=======
        shippingCost: 0,
        get total() { return this.subtotal + this.shippingCost; }
    }"
    @update-ongkir.window="shippingCost = $event.detail.cost"
    class="bg-[#FFFFFF] border border-[#E0E0E0] rounded-2xl p-6 sticky top-10 text-[#000000] shadow-xl">

    <h2 class="text-2xl font-bold mb-6 tracking-wide text-[#111827]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        {{ $title }}
    </h2>

    <div class="space-y-5">
        {{ $slot }}
    </div>

<<<<<<< HEAD
    <div class="border-t border-zinc-800/80 my-5"></div>
=======
    <div class="border-t border-[#E0E0E0]/80 my-5"></div>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

    <div class="space-y-3 text-sm">

        <div class="flex justify-between items-center text-zinc-400">
            <span>Subtotal</span>
<<<<<<< HEAD
            <span class="font-semibold text-zinc-200" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(subtotal)"></span>
        </div>
        
      <div class="flex justify-between items-center text-zinc-400">
            <span>Biaya Pengiriman</span>
            <span class="font-semibold text-[#D4AF37]" 
                  x-text="shippingCost > 0 ? 'Rp ' + new Intl.NumberFormat('id-ID').format(shippingCost) : 'Pilih kurir...'">
            </span>
        </div>
</div>
@isset($footer)
    <div class="mt-6">
        {{ $footer }}
    </div>
@endisset

=======
            <span class="font-semibold text-[#000000]" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(subtotal)"></span>
        </div>
        
        <div class="flex justify-between items-center text-zinc-400">
            <span>Biaya Pengiriman</span>
            <span class="font-semibold text-gray-700" 
                x-text="shippingCost > 0 ? 'Rp ' + new Intl.NumberFormat('id-ID').format(shippingCost) : 'Pilih kurir...'">
            </span>
        </div>
    </div>
    @isset($footer)
        <div class="mt-6">
            {{ $footer }}
        </div>
    @endisset
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
</div>
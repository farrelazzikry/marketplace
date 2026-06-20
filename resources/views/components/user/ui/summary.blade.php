@props([
    'title' => 'Ringkasan Pesanan',
    'subtotal' => 0
])

<div x-data="{
        subtotal: {{ $subtotal }},
        shippingCost: 0,
        get total() { return this.subtotal + this.shippingCost; }
    }"
    @update-ongkir.window="shippingCost = $event.detail.cost"
    class="bg-[#FFFFFF] border border-[#E0E0E0] rounded-2xl p-6 sticky top-10 text-[#000000] shadow-xl">

    <h2 class="text-2xl font-bold mb-6 tracking-wide text-[#111827]">
        {{ $title }}
    </h2>

    <div class="space-y-5">
        {{ $slot }}
    </div>

    <div class="border-t border-[#E0E0E0]/80 my-5"></div>

    <div class="space-y-3 text-sm">

        <div class="flex justify-between items-center text-zinc-400">
            <span>Subtotal</span>
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
</div>
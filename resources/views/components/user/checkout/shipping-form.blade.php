@props(['cities' => [], 'totalWeight' => 1000])

<x-user.ui.card>
    <h2 class="text-xl mb-6 font-bold tracking-wide text-[#000000]">
        Informasi Pengiriman
    </h2>

    <div x-data="shippingHandler()" class="space-y-5">

        <div>
            <label class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Nama
                Penerima</label>
            <input type="text" name="shipping_name" placeholder="Masukkan nama lengkap penerima"
                class="w-full p-3.5 rounded-xl bg-[#CCCCCC] border border-[#E0E0E0]/80 text-[#000000] placeholder-zinc-600 text-sm focus:outline-none focus:border-gray-600 transition duration-200"
                required>
        </div>

        <div>
            <label class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Nomor
                Telepon</label>
            <input type="number" name="shipping_phone" placeholder="Contoh: 081234567890"
                class="w-full p-3.5 rounded-xl bg-[#CCCCCC] border border-[#E0E0E0]/80 text-[#000000] placeholder-zinc-600 text-sm focus:outline-none focus:border-gray-600 transition duration-200"
                required>
        </div>

        <div>
            <label class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Kota
                Tujuan</label>
            <select x-model="cityId" @change="fetchOngkir()"
                class="w-full p-3.5 rounded-xl bg-[#CCCCCC] border border-[#E0E0E0]/80 text-[#000000] text-sm focus:outline-none focus:border-gray-600 transition duration-200 cursor-pointer">
                <option value="" class="text-zinc-600">-- Pilih Kota / Kabupaten --</option>
                @foreach($cities as $city)
                    <option value="{{ $city['city_id'] }}" class="bg-[#CCCCCC] text-[#000000]">
                        {{ $city['type'] }} {{ $city['city_name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label
                    class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Ekspedisi</label>
                <select x-model="courier" @change="fetchOngkir()"
                    class="w-full p-3.5 rounded-xl bg-[#CCCCCC] border border-[#E0E0E0]/80 text-[#000000] text-sm focus:outline-none focus:border-gray-600 transition duration-200 cursor-pointer">
                    <option value="jne">JNE (Jalur Nugraha Ekakurir)</option>
                    <option value="pos">POS Indonesia</option>
                    <option value="tiki">TIKI</option>
                </select>
            </div>

            <div>
                <label class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Total Berat
                    (Gram)</label>
                <input type="text" value="{{ number_format($totalWeight) }} g"
                    class="w-full p-3.5 rounded-xl bg-[#CCCCCC]/50 border border-[#E0E0E0]/30 text-zinc-400 text-sm focus:outline-none"
                    disabled readonly>
            </div>
        </div>

        <div x-show="isLoading" class="py-4 flex items-center justify-center gap-2 text-sm text-zinc-400">
            <svg class="animate-spin h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span class="tracking-wide">Memuat tarif pengiriman...</span>
        </div>

        <div x-show="!isLoading && services.length > 0" class="space-y-2.5 pt-2">
            <label class="block text-[11px] text-zinc-500 uppercase tracking-widest font-semibold">Layanan
                Tersedia</label>

            <div class="grid grid-cols-1 gap-2.5">
                <template x-for="service in services" :key="service.service">
                    <label
                        :class="selectedService === service.service ? 'border-gray-700 bg-gray-100 shadow-lg' : 'border-[#E0E0E0]/60 bg-[#FFFFFF]'"
                        class="flex items-center justify-between border rounded-xl p-4 cursor-pointer hover:border-gray-500 transition duration-300">

                        <div class="flex items-center gap-3">
                            <input type="radio" name="shipping_service_radio" :value="service.service"
                                @change="selectService(service.service, service.cost[0].value)"
                                class="w-4 h-4 accent-gray-700">
                            <div>
                                <span class="block text-sm font-bold text-[#000000]" x-text="service.service"></span>
                                <span class="text-xs text-zinc-500"
                                    x-text="`${service.description} (${service.cost[0].etd || '-'} Hari)`"></span>
                            </div>
                        </div>

                        <span class="text-sm font-bold text-gray-700"
                            x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(service.cost[0].value)"></span>
                    </label>
                </template>
            </div>
        </div>

        <div class="pt-2">
            <label class="block text-[11px] text-zinc-500 mb-2 uppercase tracking-widest font-semibold">Alamat
                Lengkap</label>
            <textarea rows="4" name="shipping_address"
                placeholder="Nama jalan, gedung, nomor rumah, RT/RW, kecamatan..."
                class="w-full p-3.5 rounded-xl bg-[#CCCCCC] border border-[#E0E0E0]/80 text-[#000000] placeholder-zinc-600 text-sm focus:outline-none focus:border-gray-600 transition duration-200 resize-none"
                required></textarea>
        </div>

        {{-- 🔥 Kirim city_id dan shipping_cost ke server --}}
        <input type="hidden" name="city_id" :value="cityId">
        <input type="hidden" name="shipping_cost" :value="selectedCost">
    </div>
</x-user.ui.card>

<script>
    function shippingHandler() {
        return {
            cityId: '',
            courier: 'jne',
            weight: {{ $totalWeight }},
            services: [],
            selectedService: '',
            selectedCost: 0,
            isLoading: false,

            async fetchOngkir() {
                if (!this.cityId) {
                    this.services = [];
                    this.resetSelection();
                    return;
                }

                this.isLoading = true;
                this.services = [];
                this.resetSelection();

                try {
                    const response = await fetch("{{ route('user.checkout.calculate-shipping') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            destination_city_id: this.cityId,
                            weight: this.weight,
                            courier: this.courier
                        })
                    });

                    const data = await response.json();
                    if (data.success) {
                        this.services = data.costs;
                    }
                } catch (error) {
                    console.error("Gagal memuat data dari RajaOngkir:", error);
                } finally {
                    this.isLoading = false;
                }
            },

            selectService(serviceName, cost) {
                this.selectedService = serviceName;
                this.selectedCost = cost;
                this.$dispatch('update-ongkir', { cost: parseInt(cost) });
            },

            resetSelection() {
                this.selectedService = '';
                this.selectedCost = 0;
                this.$dispatch('update-ongkir', { cost: 0 });
            }
        }
    }
</script>
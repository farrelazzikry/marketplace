<x-user.ui.card>
    <h2 class="text-xl mb-5 font-semibold text-white">
        Metode Pembayaran
    </h2>

    <div class="space-y-3" x-data="{ selected: '' }">

        <!-- QRIS -->
        <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer transition duration-200"
            :class="selected == 'qris' ? 'border-indigo-500 bg-indigo-500/10' : 'border-gray-700 hover:border-gray-500'">
            <div class="flex items-center">
                <input type="radio" name="payment" value="qris" x-model="selected"
                    class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-600 bg-gray-700">
                <div class="ml-4 flex items-center gap-3">
                    <!-- Logo QRIS (Ganti src dengan path logo asli kamu) -->
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg" alt="QRIS"
                        class="h-5 object-contain bg-white p-0.5 rounded">
                    <span class="font-medium">QRIS</span>
                </div>
            </div>
        </label>

        <!-- COD -->
        <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer transition duration-200"
            :class="selected == 'cod' ? 'border-indigo-500 bg-indigo-500/10' : 'border-gray-700 hover:border-gray-500'">
            <div class="flex items-center">
                <input type="radio" name="payment" value="cod" x-model="selected"
                    class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-600 bg-gray-700">
                <div class="ml-4 flex items-center gap-3">
                    <!-- Ikon COD (Bisa pakai SVG) -->
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                            <path d="M15 18H9" />
                            <path
                                d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-2.39-2.83a1 1 0 0 0-.77-.36H15v4Z" />
                            <circle cx="7" cy="18" r="2" />
                            <circle cx="17" cy="18" r="2" />
                        </svg>
                    </div>
                    <span class="font-medium">COD (Bayar di Tempat)</span>
                </div>
            </div>
        </label>

        <!-- E-Wallet -->
        <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer transition duration-200"
            :class="selected == 'ewallet' ? 'border-indigo-500 bg-indigo-500/10' : 'border-gray-700 hover:border-gray-500'">
            <div class="flex items-center">
                <input type="radio" name="payment" value="ewallet" x-model="selected"
                    class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-600 bg-gray-700">
                <div class="ml-4 flex items-center gap-3">
                    <!-- Ikon Wallet -->
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1" />
                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4" />
                        </svg>
                    </div>
                    <span class="font-medium">E-Wallet (OVO, Dana, GoPay)</span>
                </div>
            </div>
        </label>

    </div>
</x-user.ui.card>
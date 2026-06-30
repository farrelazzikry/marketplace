<x-user.ui.card>

<<<<<<< HEAD
    <h2 class="text-xl mb-6 font-bold tracking-wide text-zinc-200">
=======
    <h2 class="text-xl mb-6 font-bold tracking-wide text-[#000000]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        Metode Pembayaran
    </h2>

    <div class="space-y-3" x-data="{ selected: 'cod' }">

        {{-- QRIS --}}
        <div>
            <label
                class="flex items-center justify-between border rounded-xl p-4 cursor-pointer transition duration-200"
                :class="selected == 'qris'
<<<<<<< HEAD
                    ? 'border-[#D4AF37] bg-[#D4AF37]/5'
                    : 'border-zinc-800 bg-zinc-900/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="qris" x-model="selected"
                        class="w-4 h-4 accent-[#D4AF37]">
=======
                    ? 'border-gray-700 bg-gray-100'
                    : 'border-[#E0E0E0] bg-[#CCCCCC]/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="qris" x-model="selected"
                        class="w-4 h-4 accent-gray-700">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

                    <div class="ml-4 flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg"
                            class="h-5 bg-white rounded px-1 py-0.5 invert">
<<<<<<< HEAD
                        <span class="font-semibold text-sm tracking-wide text-zinc-200">QRIS</span>
                    </div>
                </div>

            </label>

            {{-- Detail Tampilan QRIS Dinamis --}}
            <div x-show="selected == 'qris'" x-collapse
                class="mt-2 p-5 bg-zinc-900 border border-zinc-800 rounded-xl flex flex-col items-center justify-center space-y-2">
                <p class="text-xs text-amber-500 font-medium text-center">
=======
                        <span class="font-semibold text-sm tracking-wide text-[#000000]">QRIS</span>
                    </div>
                </div>
            </label>

            <div x-show="selected == 'qris'" x-collapse
                class="mt-2 p-5 bg-[#CCCCCC] border border-[#E0E0E0] rounded-xl flex flex-col items-center justify-center space-y-2">
                <p class="text-xs text-gray-600 font-medium text-center">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                    * Kode QRIS otomatis terintegrasi dengan total tagihan Anda dan akan dibuat setelah Anda menekan
                    tombol proses pesanan.
                </p>
            </div>
        </div>

        {{-- COD --}}
        <div>
            <label
                class="flex items-center justify-between border rounded-xl p-4 cursor-pointer transition duration-200"
                :class="selected == 'cod'
<<<<<<< HEAD
                    ? 'border-[#D4AF37] bg-[#D4AF37]/5'
                    : 'border-zinc-800 bg-zinc-900/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="cod" x-model="selected"
                        class="w-4 h-4 accent-[#D4AF37]">

                    <div class="ml-4">
                        <span class="font-semibold text-sm tracking-wide text-zinc-200">COD (Bayar di Tempat)</span>
                    </div>
                </div>

=======
                    ? 'border-gray-700 bg-gray-100'
                    : 'border-[#E0E0E0] bg-[#CCCCCC]/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="cod" x-model="selected"
                        class="w-4 h-4 accent-gray-700">

                    <div class="ml-4">
                        <span class="font-semibold text-sm tracking-wide text-[#000000]">COD (Bayar di Tempat)</span>
                    </div>
                </div>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            </label>
        </div>

        {{-- SEABANK --}}
        <div>
            <label
                class="flex items-center justify-between border rounded-xl p-4 cursor-pointer transition duration-200"
                :class="selected == 'seabank'
<<<<<<< HEAD
                    ? 'border-[#D4AF37] bg-[#D4AF37]/5'
                    : 'border-zinc-800 bg-zinc-900/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="seabank" x-model="selected"
                        class="w-4 h-4 accent-[#D4AF37]">

                    <div class="ml-4">
                        <span class="font-semibold text-sm tracking-wide text-zinc-200">Transfer Manual SeaBank</span>
                    </div>
                </div>

            </label>

            {{-- Detail Tampilan No Rekening SeaBank --}}
            <div x-show="selected == 'seabank'" x-collapse
                class="mt-2 p-5 bg-zinc-900 border border-zinc-800 rounded-xl space-y-3">
                <p class="text-xs text-zinc-400">Silakan lakukan transfer manual ke rekening SeaBank berikut:</p>
                <div class="bg-[#111111] p-4 rounded-xl border border-zinc-800 flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider mb-1">Nomor Rekening</p>
                        <p class="text-lg font-mono text-[#D4AF37] font-bold tracking-widest">9012 3456 7890</p>
                        <p class="text-xs text-zinc-300 mt-1.5 font-medium">Atas Nama: <span
                                class="text-white font-semibold">PT Calvera ID Solusindo</span></p>
                    </div>
                </div>
                <p class="text-[11px] text-amber-500 font-medium">* Pesanan akan diproses setelah bukti transfer
=======
                    ? 'border-gray-700 bg-gray-100'
                    : 'border-[#E0E0E0] bg-[#CCCCCC]/40 hover:border-zinc-700'">

                <div class="flex items-center">
                    <input type="radio" name="payment_method" value="seabank" x-model="selected"
                        class="w-4 h-4 accent-gray-700">

                    <div class="ml-4">
                        <span class="font-semibold text-sm tracking-wide text-[#000000]">Transfer Manual SeaBank</span>
                    </div>
                </div>
            </label>

            <div x-show="selected == 'seabank'" x-collapse
                class="mt-2 p-5 bg-[#CCCCCC] border border-[#E0E0E0] rounded-xl space-y-3">
                <p class="text-xs text-zinc-400">Silakan lakukan transfer manual ke rekening SeaBank berikut:</p>
                <div class="bg-[#FFFFFF] p-4 rounded-xl border border-[#E0E0E0] flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider mb-1">Nomor Rekening</p>
                        <p class="text-lg font-mono text-gray-700 font-bold tracking-widest">9012 3456 7890</p>
                        <p class="text-xs text-zinc-300 mt-1.5 font-medium">Atas Nama: <span
                                class="text-[#000000] font-semibold">PT Calvera ID Solusindo</span></p>
                    </div>
                </div>
                <p class="text-[11px] text-gray-600 font-medium">* Pesanan akan diproses setelah bukti transfer
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                    berhasil diverifikasi oleh admin.</p>
            </div>
        </div>

    </div>
</x-user.ui.card>
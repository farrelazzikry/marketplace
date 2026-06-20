@props(['categories'])

<div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm"
    x-cloak>

    <div class="bg-white border border-[#E5E7EB] p-6 rounded-xl w-full max-w-lg shadow-2xl"
        @click.away="openModal = false">

        <h2 class="text-xl font-bold text-[#111827] mb-4">
            Tambah Produk Baru
        </h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                {{-- IMAGE --}}
                <div>
                    <label class="block text-sm text-[#6B7280] mb-1">Foto Produk</label>
                    <input type="file" name="image" required class="w-full text-sm text-[#474747]
                        file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                        file:bg-[#4B5563] file:text-white hover:file:bg-[#374151]">
                </div>

                {{-- NAME --}}
                <div>
                    <label class="block text-sm text-[#6B7280] mb-1">Nama Produk</label>
                    <input type="text" name="name" required
                        class="bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563] w-full">
                </div>

                {{-- CATEGORY + PRICE --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Kategori</label>
                        <select name="category"
                            class="bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563] w-full">
                            @foreach($categories as $cat)
                                <option value="{{ $cat['name'] }}">{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Harga</label>
                        <input type="number" name="price" required
                            class="w-full bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563]">
                    </div>
                </div>

                {{-- DISCOUNT + STOCK --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Harga Diskon</label>
                        <input type="number" name="discount_price"
                            class="w-full bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563]">
                    </div>
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Stock</label>
                        <input type="number" name="stock" required
                            class="w-full bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563]">
                    </div>
                </div>

                {{-- SIZE --}}
                <div>
                    <label class="block text-sm text-[#6B7280] mb-1">Size</label>
                    <input type="text" name="size" placeholder="S, M, L"
                        class="w-full bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563]">
                </div>

                {{-- DESC --}}
                <div>
                    <label class="block text-sm text-[#6B7280] mb-1">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full bg-white border border-[#D1D5DB] rounded-xl p-3 text-[#111827] outline-none focus:border-[#4B5563]"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" @click="openModal = false"
                    class="px-4 py-2 text-[#6B7280] hover:text-[#111827] transition font-medium">Batal</button>
                <x-admin.ui.button type="primary">Simpan Produk</x-admin.ui.button>
            </div>
        </form>
    </div>
</div>
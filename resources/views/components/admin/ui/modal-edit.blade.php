@props(['categories'])

<div x-show="editOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm" x-cloak>

    <div class="bg-[#1A1A1A] border border-[#2A2A2A] p-6 rounded-xl w-full max-w-lg shadow-2xl"
        @click.away="editOpen = false">

        <h2 class="text-xl font-bold text-white mb-4">
            Edit Produk
        </h2>

        <form :action="'{{ url('admin/products') }}/' + editProduct.id + '/update'" method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="space-y-4 text-left">

                {{-- IMAGE --}}
                <div>

                    <label class="block text-sm text-gray-400 mb-1">
                        Foto Produk
                    </label>

                    <input type="file" name="image" class="w-full text-sm text-gray-400
                        file:mr-4
                        file:py-2
                        file:px-4
                        file:rounded-full
                        file:border-0
                        file:text-sm
                        file:font-semibold
                        file:bg-blue-600
                        file:text-white
                        hover:file:bg-blue-700">

                </div>

                {{-- NAME --}}
                <div>

                    <label class="block text-sm text-gray-400 mb-1">
                        Nama Produk
                    </label>

                    <input type="text" name="name" x-model="editProduct.name"
                        class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none focus:border-blue-500">

                </div>

                {{-- CATEGORY + PRICE --}}
                <div class="grid grid-cols-2 gap-4">

                    <div>

                        <label class="block text-sm text-gray-400 mb-1">
                            Kategori
                        </label>

                        <select name="category" x-model="editProduct.category"
                            class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none">

                            @foreach($categories as $cat)

                                <option value="{{ $cat['name'] }}">
                                    {{ $cat['name'] }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block text-sm text-gray-400 mb-1">
                            Harga
                        </label>

                        <input type="number" name="price" x-model="editProduct.price"
                            class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none">

                    </div>

                </div>

                {{-- DISCOUNT + STOCK --}}
                <div class="grid grid-cols-2 gap-4">

                    <div>

                        <label class="block text-sm text-gray-400 mb-1">
                            Harga Diskon
                        </label>

                        <input type="number" name="discount_price" x-model="editProduct.discount_price"
                            class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none">

                    </div>

                    <div>

                        <label class="block text-sm text-gray-400 mb-1">
                            Stock
                        </label>

                        <input type="number" name="stock" x-model="editProduct.stock"
                            class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none">

                    </div>

                </div>

                {{-- SIZE --}}
                <div>

                    <label class="block text-sm text-gray-400 mb-1">
                        Size
                    </label>

                    <input type="text" name="size" x-model="editProduct.size"
                        class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none">

                </div>

                {{-- DESC --}}
                <div>

                    <label class="block text-sm text-gray-400 mb-1">
                        Deskripsi
                    </label>

                    <textarea name="description" rows="3" x-model="editProduct.desc"
                        class="w-full bg-[#121212] border border-[#2A2A2A] rounded-lg p-2 text-white outline-none"></textarea>

                </div>

            </div>

            <div class="mt-6 flex justify-end gap-3">

                <button type="button" @click="editOpen = false"
                    class="px-4 py-2 text-gray-400 hover:text-white transition">

                    Batal

                </button>

                <x-admin.ui.button type="primary">
                    Update Produk
                </x-admin.ui.button>

            </div>

        </form>

    </div>

</div>
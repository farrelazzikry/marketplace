@extends('layout.user')

@section('content')
    <div class="py-6 text-[#000000] min-h-screen">

        <div class="mb-8">
            <a href="{{ route('products.index') }}"
                class="text-[11px] uppercase tracking-widest text-zinc-500 hover:text-black transition duration-300 flex items-center gap-2">
                ← Back To Catalogue
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- GAMBAR PRODUK (tanpa border) --}}
            <div class="rounded-2xl overflow-hidden bg-zinc-950/40 p-2">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-auto object-cover rounded-xl shadow-inner">
            </div>

            <div class="space-y-8">

                <div class="space-y-3 pb-6">
                    <h1 class="text-2xl md:text-4xl tracking-tight text-[#000000]">
                        {{ $product->name }}
                    </h1>

                    <div class="pt-2">
                        @if($product->discount_price)
                            <div class="flex items-baseline gap-3">
                                <span class="text-xl md:text-2xl text-[#111827] font-semibold tracking-wider">
                                    IDR {{ number_format($product->discount_price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs md:text-sm text-black line-through tracking-wide">
                                    IDR {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                        @else
                            <span class="text-xl md:text-2xl text-black font-medium tracking-wider">
                                IDR {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex items-center gap-2 text-xs tracking-wide">
                    <span class="text-zinc-500">Availability:</span>
                    @if($product->stock > 0)
                        <span
                            class="text-black font-medium bg-gray-200 px-2.5 py-0.5 rounded-full text-[10px] uppercase border border-gray-300">
                            In Stock ({{ $product->stock }})
                        </span>
                    @else
                        <span
                            class="text-gray-600 font-medium bg-[#FF0000] px-2.5 py-0.5 rounded-full text-[10px] uppercase border border-gray-300">
                            Out of Stock
                        </span>
                    @endif
                </div>

                <div class="space-y-2">
                    <h3 class="text-xs uppercase tracking-widest text-black font-semibold">Description</h3>
                    <p class="text-sm text-black leading-relaxed font-light">{{ $product->description }}</p>
                </div>

                <div class="pt-4 border-t border-[#CCCCCC]/60">
                    @if(session('is_login'))
                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST" class="space-y-6"
                            id="detail-form">
                            @csrf

                            <div class="space-y-2">
                                <label class="block text-[11px] uppercase tracking-widest text-zinc-400 font-medium">Select
                                    Size</label>
                                <div class="relative">
                                    <select name="size" id="detail-size" required
                                        class="w-full bg-[#FFFFFF] border border-[#E0E0E0] rounded-xl px-4 py-3 text-sm text-[#000000] outline-none focus:border-gray-600 focus:ring-1 focus:ring-gray-600 transition duration-300 appearance-none">
                                        <option value="" disabled selected>-- Pilih Ukuran --</option>
                                        @foreach(explode(',', $product->size) as $size)
                                            <option value="{{ trim($size) }}">{{ trim($size) }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-500">
                                        <span class="text-[10px]">▼</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3">
                                <button type="submit"
                                    class="flex-1 bg-[#111827] hover:bg-[#1F2937] text-white text-xs uppercase tracking-widest font-bold py-3.5 rounded-xl transition duration-300 shadow-xl">
                                    Masukkan Keranjang
                                </button>

                                <button type="button" id="btn-beli-sekarang"
                                    class="flex-1 bg-white hover:bg-gray-200 text-[#111827] border border-[#111827] text-xs uppercase tracking-widest font-bold py-3.5 rounded-xl transition duration-300 shadow-xl">
                                    Beli Sekarang
                                </button>
                            </div>
                        </form>

                        <script>
                            document.getElementById('btn-beli-sekarang').addEventListener('click', function () {
                                const form = document.getElementById('detail-form');
                                const size = document.getElementById('detail-size').value;
                                if (!size) {
                                    alert('Silakan pilih ukuran terlebih dahulu.');
                                    return;
                                }
                                form.action = '{{ route('user.checkout.direct', $product->id) }}';
                                form.submit();
                            });
                        </script>
                    @else
                        <a href="{{ route('login') }}"
                            class="block w-full text-center bg-[#CCCCCC] border border-[#E0E0E0] hover:border-zinc-700 text-[#000000] text-xs uppercase tracking-widest font-bold py-3.5 rounded-xl transition duration-300">
                            Sign In To Purchase
                        </a>
                    @endif
                </div>

                <div class="bg-white p-4 rounded-xl border border-[#CCCCCC]/80 space-y-2.5">
                    <div class="flex items-center gap-3 text-xs text-zinc-500">
                        <span class="text-base">🚚</span>
                        <span class="text-black tracking-wide">Pengiriman instan bebas biaya khusus kawasan Batam.</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-zinc-500">
                        <span class="text-base">🛡️</span>
                        <span class="text-black tracking-wide">Garansi autentikasi & pengembalian penukaran produk 7
                            hari.</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
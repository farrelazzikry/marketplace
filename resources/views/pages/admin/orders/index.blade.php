@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Pesanan" subtitle="Kelola Pesanan User" />

    <x-admin.ui.table>

        <x-slot:head>
            <tr class="border-b border-[#E5E7EB]">
                <th class="py-3 text-left">ID Order</th>
                <th class="text-left">User</th>
                <th class="text-left">Produk</th>
                <th class="text-left">Total</th>
                <th class="text-left">Pembayaran</th>
                <th class="text-left">Status</th>
                <th class="text-left">No. Resi</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>
                @forelse($orders as $order)
                    <tr class="border-b border-[#E5E7EB]">
                        <td class="py-4 font-mono text-[#000000]">#{{ $order->id }}</td>
                        <td class="font-semibold text-[#000000]">{{ $order->user->name }}</td>
                        <td class="text-[#000000]">
                            @foreach($order->items as $item)
                                <div>{{ $item->product->name }} ({{ $item->quantity }}x)</div>
                            @endforeach
                        </td>
                        <td class="font-semibold text-[#000000]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td><x-status :status="$order->payment_status" /></td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                    class="bg-[#FFFFFF] border border-[#D1D5DB] text-xs text-[#000000] rounded-lg p-2 focus:outline-none focus:border-[#4B5563]">
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                                    </option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @if($order->tracking_number)
                                <div class="flex items-center gap-2">
                                    <span class="text-blue-600 font-semibold">{{ $order->tracking_number }}</span>
                                    <form action="{{ route('admin.orders.updateTracking', $order->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <input type="text" name="tracking_number" value="{{ $order->tracking_number }}"
                                            class="border border-[#D1D5DB] rounded px-2 py-1 text-xs w-24 hidden"
                                            placeholder="Ubah resi...">
                                        <button type="submit" class="text-xs text-gray-500 hover:text-blue-600"
                                            title="Edit resi">✎</button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('admin.orders.updateTracking', $order->id) }}" method="POST"
                                    class="flex items-center gap-1">
                                    @csrf
                                    <input type="text" name="tracking_number" placeholder="Masukkan resi..."
                                        class="border border-[#D1D5DB] rounded-lg px-2 py-1 text-xs w-28 focus:outline-none focus:border-[#4B5563]">
                                    <button type="submit"
                                        class="bg-[#111827] hover:bg-[#1F2937] text-white text-xs px-3 py-1 rounded-lg font-semibold transition">Simpan</button>
                                </form>
                            @endif
                        </td>
                        <td class="text-center text-xs text-gray-400">
                            @if($order->tracking_number)
                                <span class="text-green-600">✓</span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-10 text-center text-[#000000]">Belum ada pesanan</td>
                    </tr>
                @endforelse
                </x-slot>

    </x-admin.ui.table>

@endsection
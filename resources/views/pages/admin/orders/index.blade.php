@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Pesanan" subtitle="Kelola Pesanan User" />

    <x-admin.ui.table>

        <x-slot:head>

            <tr class="border-b border-[#2A2A2A] text-gray-300">
                <th class="py-3">ID Order</th>
                <th>User</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>

            </x-slot>

            <x-slot:body>

                @forelse($orders as $order)

                    <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">

                        <td class="py-4 font-mono text-blue-400">
                            #{{ $order->id }}
                        </td>

                        <td class="font-semibold text-white">
                            {{ $order->user->name }}
                        </td>

                        <td class="text-sm text-gray-400">

                            @foreach($order->items as $item)

                                <div>
                                    {{ $item->product->name }}
                                    ({{ $item->quantity }}x)
                                </div>

                            @endforeach

                        </td>

                        <td class="text-white font-semibold">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </td>

                        <td>
                            <x-status :status="$order->payment_status" />
                        </td>

                        <td>
                            <x-status :status="$order->status" />
                        </td>

                        <td class="text-center">

                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">

                                @csrf

                                <select name="status" onchange="this.form.submit()"
                                    class="bg-[#121212] border border-[#2A2A2A] text-xs text-gray-300 rounded-lg p-2 focus:outline-none">

                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Processing
                                    </option>

                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                        Shipped
                                    </option>

                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>

                                </select>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="py-10 text-center text-gray-500">
                            Belum ada pesanan
                        </td>
                    </tr>

                @endforelse

                </x-slot>

    </x-admin.ui.table>

@endsection
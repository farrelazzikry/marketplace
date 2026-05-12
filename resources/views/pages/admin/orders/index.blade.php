@extends('layout.admin')

@section('content')
    <x-admin.layout.page-header title="Pesanan" subtitle="Kelola Transaksi User" />

    <x-admin.ui.table>
        <x-slot:head>
            <tr class="border-b border-[#2A2A2A] text-gray-300">
                <th class="py-3">ID Order</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>
                @foreach ($orders as $order)
                    <tr class="border-b border-[#2A2A2A] hover:bg-[#222] transition">
                        <td class="py-3 font-mono text-blue-400">{{ $order['id'] }}</td>
                        <td class="font-semibold text-white">{{ $order['customer'] }}</td>
                        <td class="text-gray-400 text-sm">{{ $order['items'] }}</td>
                        <td class="text-white">{{ $order['total'] }}</td>
                        <td>
                            {{-- Badge Status --}}
                            <span class="px-3 py-1 rounded-full text-[10px] uppercase font-bold
                                    {{ $order['status'] == 'Proses' ? 'bg-blue-500/20 text-blue-500' : '' }}
                                    {{ $order['status'] == 'Dikirim' ? 'bg-yellow-500/20 text-yellow-500' : '' }}
                                    {{ $order['status'] == 'Selesai' ? 'bg-green-500/20 text-green-500' : '' }}
                                    {{ $order['status'] == 'Refund' ? 'bg-red-500/20 text-red-500' : '' }}">
                                {{ $order['status'] }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{-- Form Ganti Status --}}
                            <form action="{{ route('admin.orders.updateStatus', $order['id']) }}" method="POST"
                                class="flex items-center gap-2 justify-center">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                    class="bg-[#121212] border border-[#2A2A2A] text-xs text-gray-300 rounded p-1 focus:outline-none focus:border-blue-500 transition">
                                    <option value="Proses" {{ $order['status'] == 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Dikirim" {{ $order['status'] == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="Selesai" {{ $order['status'] == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Refund" {{ $order['status'] == 'Refund' ? 'selected' : '' }}>Refund</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </x-slot>
    </x-admin.ui.table>
@endsection
@extends('layout.admin')

@section('content')

    <x-admin.layout.page-header title="Kelola User" subtitle="Daftar Pengguna" />

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm">
            {{ session('error') }}
        </div>
    @endif

    <x-admin.ui.table>
        <x-slot:head>
            <tr class="border-b border-[#E5E7EB]">
                <th class="py-3 text-left">#</th>
                <th class="text-left">Nama</th>
                <th class="text-left">Email</th>
                <th class="text-left">Role</th>
                <th class="text-left">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </x-slot>

            <x-slot:body>
                @forelse($users as $user)
                    <tr class="border-b border-[#E5E7EB]">
                        <td class="py-3 text-[#000000]">{{ $loop->iteration }}</td>
                        <td class="font-semibold text-[#000000]">{{ $user->name }}</td>
                        <td class="text-[#000000]">{{ $user->email }}</td>
                        <td>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $user->role == 'admin' ? 'bg-[#111827] text-white' : 'bg-[#E5E7EB] text-[#000000]' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            @if($user->isBlocked())
                                <span class="text-red-600 font-semibold text-sm">🔴 Diblokir</span>
                            @else
                                <span class="text-green-600 font-semibold text-sm">🟢 Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-2 flex-wrap">
                                @if($user->id == session('user_id'))
                                    {{-- Admin sendiri: tidak ada tombol aksi --}}
                                    <span class="text-xs text-gray-400 italic">(Akun Anda)</span>
                                @else
                                    {{-- User lain: tampilkan tombol aksi --}}
                                    @if($user->isBlocked())
                                        <form action="{{ route('admin.users.unblock', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1.5 rounded-lg font-semibold transition border border-white/30 shadow-md">
                                                Unblokir
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.users.block', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Blokir user ini?')"
                                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1.5 rounded-lg font-semibold transition border border-white/30 shadow-md">
                                                Blokir
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.users.resetPassword', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Reset password user ini?')"
                                            class="bg-[#111827] hover:bg-[#1F2937] text-white text-xs px-3 py-1.5 rounded-lg font-semibold transition border border-white/30 shadow-md">
                                            Reset Password
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-[#000000]">Belum ada user</td>
                    </tr>
                @endforelse
                </x-slot>
    </x-admin.ui.table>

@endsection
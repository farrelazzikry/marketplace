@extends('layout.user')

@section('content')

    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-2xl font-bold text-[#111827] mb-8">Profil Saya</h1>

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

        {{-- EDIT PROFILE --}}
        <div class="bg-white rounded-2xl border border-[#E5E7EB] p-6 shadow-sm mb-6">
            <h2 class="text-lg font-semibold text-[#111827] mb-4">Edit Profil</h2>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full bg-white border border-[#D1D5DB] rounded-xl px-4 py-3 text-[#111827] focus:outline-none focus:border-[#4B5563]">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full bg-white border border-[#D1D5DB] rounded-xl px-4 py-3 text-[#111827] focus:outline-none focus:border-[#4B5563]">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-[#111827] hover:bg-[#1F2937] text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Simpan Profil
                    </button>
                </div>
            </form>
        </div>

        {{-- GANTI PASSWORD --}}
        <div class="bg-white rounded-2xl border border-[#E5E7EB] p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-[#111827] mb-4">Ganti Password</h2>
            <form action="{{ route('user.profile.updatePassword') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Password Saat Ini</label>
                        <div class="relative">
                            <input type="password" name="current_password" id="current_password"
                                class="w-full bg-white border border-[#D1D5DB] rounded-xl px-4 py-3 pr-12 text-[#111827] focus:outline-none focus:border-[#4B5563]">
                            <button type="button" onclick="togglePassword('current_password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-[#6B7280] hover:text-[#111827] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Password Baru</label>
                        <div class="relative">
                            <input type="password" name="password" id="new_password"
                                class="w-full bg-white border border-[#D1D5DB] rounded-xl px-4 py-3 pr-12 text-[#111827] focus:outline-none focus:border-[#4B5563]">
                            <button type="button" onclick="togglePassword('new_password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-[#6B7280] hover:text-[#111827] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-[#6B7280] mb-1">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="confirm_password"
                                class="w-full bg-white border border-[#D1D5DB] rounded-xl px-4 py-3 pr-12 text-[#111827] focus:outline-none focus:border-[#4B5563]">
                            <button type="button" onclick="togglePassword('confirm_password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-[#6B7280] hover:text-[#111827] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-[#111827] hover:bg-[#1F2937] text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Ganti Password
                    </button>
                </div>
            </form>
        </div>

    </div>
    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
            }
        }
    </script>

@endsection
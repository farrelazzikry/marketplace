@extends('layout.auth')

@section('content')
    <div>
<<<<<<< HEAD
        {{-- Header Form --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold tracking-tight text-white font-serif-luxury italic">Welcome Back</h1>
            <p class="text-xs text-zinc-500 tracking-wider uppercase mt-1">Masuk ke akun Calvera kamu</p>
        </div>

        {{-- Notifikasi Error Internal Form --}}
        @if(session('error') || $errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs space-y-1">
                @if(session('error'))
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-rose-500"></span>
=======
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-[#111827]">Welcome Back</h1>
            <p class="text-xs text-zinc-500 tracking-wider uppercase mt-1">Masuk ke akun Calvera kamu</p>
        </div>

        @if(session('error') || $errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 text-xs space-y-1">
                @if(session('error'))
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-gray-600"></span>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
<<<<<<< HEAD
                        <span class="w-1 h-1 rounded-full bg-rose-500"></span>
=======
                        <span class="w-1 h-1 rounded-full bg-gray-600"></span>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

<<<<<<< HEAD
        {{-- Form Data --}}
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="name@domain.com" required
<<<<<<< HEAD
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
=======
                    class="w-full px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] transition duration-300">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Password</label>
<<<<<<< HEAD
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
            </div>

            <button type="submit"
                class="w-full mt-2 bg-white hover:bg-[#D4AF37] text-black py-3 rounded-xl text-xs tracking-wider font-bold uppercase transition duration-300 shadow-lg shadow-white/5">
=======
                <div class="relative">
                    <input type="password" name="password" id="login-password" placeholder="••••••••" required
                        class="w-full px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] transition duration-300 pr-12">
                    <button type="button" onclick="togglePassword('login-password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between mt-2">
                <label class="flex items-center text-sm text-zinc-400 cursor-pointer">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 mr-2 accent-[#111827] rounded border-[#D1D5DB] focus:ring-0">
                    <span>Ingat Saya</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-xs text-zinc-500 hover:text-black transition">
                    Lupa Password?
                </a>
            </div>

            <button type="submit"
                class="w-full mt-2 bg-[#111827] hover:bg-[#1F2937] text-white py-3 rounded-xl text-xs tracking-wider font-bold uppercase transition duration-300 shadow-lg shadow-white/5">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                Sign In
            </button>
        </form>

<<<<<<< HEAD
        {{-- Footer Form Navigation --}}
        <div class="mt-8 pt-5 border-t border-zinc-900/60 text-center">
            <p class="text-xs text-zinc-500 tracking-wide">
                Belum memiliki akun resmi?
                <a href="{{ route('register') }}"
                    class="text-white hover:text-[#D4AF37] ml-1 font-medium underline transition duration-300">
=======
        <div class="mt-8 pt-5 border-t border-[#CCCCCC]/60 text-center">
            <p class="text-xs text-zinc-500 tracking-wide">
                Belum memiliki akun resmi?
                <a href="{{ route('register') }}"
                    class="text-gray-700 hover:text-black ml-1 font-medium underline transition duration-300">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                    Register disini
                </a>
            </p>
        </div>
    </div>
<<<<<<< HEAD
=======

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>`;
            }
        }
    </script>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
@endsection
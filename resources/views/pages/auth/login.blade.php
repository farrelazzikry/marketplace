@extends('layout.auth')

@section('content')
    <div>
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
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-rose-500"></span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Form Data --}}
        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="name@domain.com" required
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Password</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
            </div>

            <button type="submit"
                class="w-full mt-2 bg-white hover:bg-[#D4AF37] text-black py-3 rounded-xl text-xs tracking-wider font-bold uppercase transition duration-300 shadow-lg shadow-white/5">
                Sign In
            </button>
        </form>

        {{-- Footer Form Navigation --}}
        <div class="mt-8 pt-5 border-t border-zinc-900/60 text-center">
            <p class="text-xs text-zinc-500 tracking-wide">
                Belum memiliki akun resmi?
                <a href="{{ route('register') }}"
                    class="text-white hover:text-[#D4AF37] ml-1 font-medium underline transition duration-300">
                    Register disini
                </a>
            </p>
        </div>
    </div>
@endsection
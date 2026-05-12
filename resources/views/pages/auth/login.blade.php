@extends('layout.auth')

@section('content')

    <div class="bg-[#1A1A1A] p-8 rounded-2xl shadow-lg w-[380px]">

        <h1 class="text-2xl font-bold mb-2 text-white">Login</h1>
        <p class="text-sm text-gray-400 mb-6">Masuk ke dashboard kamu</p>

        {{-- ERROR --}}
        @if(session('error'))
            <div class="mb-4 text-sm text-red-500">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            <input type="email" name="email" placeholder="Email" required
                class="w-full px-4 py-2 rounded-lg bg-[#0D0D0D] border border-gray-700 text-white focus:outline-none focus:border-gray-500">

            <input type="password" name="password" placeholder="Password" required
                class="w-full px-4 py-2 rounded-lg bg-[#0D0D0D] border border-gray-700 text-white focus:outline-none focus:border-gray-500">

            <button type="submit"
                class="w-full bg-white text-black py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                Login
            </button>

        </form>

        <p class="text-sm text-gray-400 mt-4 text-center">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-white hover:underline">
                Register
            </a>
        </p>

    </div>

@endsection
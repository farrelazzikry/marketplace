@extends('layout.auth')

@section('content')

    <div class="bg-[#1A1A1A] p-8 rounded-2xl shadow-lg">

        <h1 class="text-2xl font-bold mb-2">Register</h1>
        <p class="text-sm text-gray-400 mb-6">Buat akun baru</p>

        <form class="space-y-4">

            <input type="text" placeholder="Nama"
                class="w-full px-4 py-2 rounded-lg bg-[#0D0D0D] border border-gray-700 focus:outline-none focus:border-gray-500">

            <input type="email" placeholder="Email"
                class="w-full px-4 py-2 rounded-lg bg-[#0D0D0D] border border-gray-700 focus:outline-none focus:border-gray-500">

            <input type="password" placeholder="Password"
                class="w-full px-4 py-2 rounded-lg bg-[#0D0D0D] border border-gray-700 focus:outline-none focus:border-gray-500">

            <button class="w-full bg-white text-black py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                Register
            </button>

        </form>

        <p class="text-sm text-gray-400 mt-4 text-center">
            Sudah punya akun? <a href="/login" class="text-white hover:underline">Login</a>
        </p>

    </div>

@endsection
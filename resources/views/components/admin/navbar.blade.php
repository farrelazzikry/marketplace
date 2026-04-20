<div class="bg-black border-b border-gray-800 px-6 py-5 flex items-center justify-between">

    <!-- LEFT -->
    <div>
        <h1 class="text-2xl font-bold">{{ $title ?? 'Dashboard' }}</h1>
        <p class="text-sm text-gray-400">{{ $subtitle ?? 'Selamat datang kembali' }}</p>
    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-6">

        @if($showSearch ?? true)
            <div class="hidden md:block">
                <input type="text" placeholder="Cari..."
                    class="px-4 py-2 rounded-lg bg-[#1A1A1A] border border-gray-700 focus:outline-none focus:border-gray-500">
            </div>
        @endif

        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-sm font-semibold">{{ $userName ?? 'Admin' }}</p>
                <p class="text-xs text-gray-400">{{ $role ?? 'Admin' }}</p>
            </div>

            <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center">
                <span class="text-sm font-bold">
                    {{ $initial ?? 'A' }}
                </span>
            </div>
        </div>

    </div>

</div>
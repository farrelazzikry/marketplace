<nav class="bg-black border-b border-gray-800 px-4 md:px-6 py-4 flex items-center justify-between sticky top-0 z-30">
    <!-- LEFT SECTION -->
    <div class="flex items-center gap-4">
        <!-- Tombol Burger Mobile (Hanya muncul jika sidebar tertutup di mobile) -->
        <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
        </button>

        <div>
            <h1 class="text-lg md:text-2xl font-medium text-white">{{ $title ?? 'Dashboard' }}</h1>
        </div>
    </div>

    <!-- RIGHT SECTION (Profil) -->
    <div class="flex items-center gap-4">
        <!-- Profil dropdown kamu tetap di sini -->
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open"
                class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center font-bold text-white uppercase border-2 border-transparent hover:border-blue-400 transition">
                {{ substr(session('user_name') ?? 'A', 0, 1) }}
            </button>

            <div x-show="open" x-cloak x-transition
                class="absolute right-0 mt-2 w-48 bg-[#1A1A1A] border border-gray-800 rounded-xl py-2 z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
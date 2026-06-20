@props(['title' => 'Dashboard'])

<nav class="bg-white border-b border-[#E5E7EB] px-6 py-4 flex items-center justify-between sticky top-0 z-30">
    {{-- KIRI: Toggle Sidebar + Judul --}}
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true"
            class="md:hidden text-[#6B7280] hover:text-[#111827] p-2 rounded-lg bg-[#F9FAFB] border border-[#E5E7EB] transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
        </button>

        <div>
            <h1 class="text-xl font-bold tracking-wide text-[#111827]">
                {{ $title }}
            </h1>
        </div>
    </div>

    {{-- KANAN: Profile Avatar --}}
    <div class="flex items-center gap-4">
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open"
                class="w-10 h-10 bg-[#111827] text-white rounded-full flex items-center justify-center text-xs font-bold uppercase hover:bg-[#1F2937] transition">
                {{ substr(session('user_name') ?? 'A', 0, 1) }}
            </button>
        </div>
    </div>
</nav>
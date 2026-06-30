<<<<<<< HEAD
<nav
    class="bg-[#060606]/80 backdrop-blur-md border-b border-zinc-900/60 px-6 py-4 flex items-center justify-between sticky top-0 z-30">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true"
            class="md:hidden text-zinc-400 hover:text-white p-1.5 rounded-lg bg-zinc-900 border border-zinc-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
=======
@props(['title' => 'Dashboard'])

<nav class="bg-white border-b border-[#E5E7EB] px-6 py-4 flex items-center justify-between sticky top-0 z-30">
    {{-- KIRI: Toggle Sidebar + Judul --}}
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true"
            class="md:hidden text-[#6B7280] hover:text-[#111827] p-2 rounded-lg bg-[#F9FAFB] border border-[#E5E7EB] transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
                stroke="currentColor" stroke-width="2">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
        </button>

        <div>
<<<<<<< HEAD
            <h1 class="text-md font-semibold font-serif-luxury tracking-wide text-zinc-100">{{ $title ?? 'Control Room' }}</h1>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open"
                class="w-8 h-8 bg-zinc-800 border border-zinc-700 rounded-full flex items-center justify-center text-xs font-bold text-zinc-300 uppercase hover:border-zinc-500 transition">
                {{ substr(session('user_name') ?? 'A', 0, 1) }}
            </button>

            <div x-show="open" x-cloak x-transition.origin.top.right
                class="absolute right-0 mt-2.5 w-48 bg-[#0A0A0A] border border-zinc-900 rounded-xl py-1.5 z-50 shadow-2xl">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-xs font-medium text-red-400 hover:bg-red-500/10 tracking-wide uppercase">Logout</button>
                </form>
            </div>
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        </div>
    </div>
</nav>
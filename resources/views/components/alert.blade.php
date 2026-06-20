@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-5 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-5 scale-95" x-init="setTimeout(() => show = false, 2500)"
        class="fixed top-5 left-1/2 -translate-x-1/2 z-[9999]" style="display: none;">

        <div class="bg-gray-100 border border-gray-300 text-gray-700 px-5 py-3 rounded-xl shadow-2xl
                        flex items-center gap-3 min-w-[260px]">

            <div class="w-8 h-8 rounded-full bg-gray-300/50 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <p class="text-sm font-medium text-[#000000]">
                {{ session('success') }}
            </p>
        </div>
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-5 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-5 scale-95" x-init="setTimeout(() => show = false, 2500)"
        class="fixed top-5 left-1/2 -translate-x-1/2 z-[9999]" style="display: none;">

        <div class="bg-gray-100 border border-gray-300 text-gray-700 px-5 py-3 rounded-xl shadow-2xl
                        flex items-center gap-3 min-w-[260px]">

            <div class="w-8 h-8 rounded-full bg-gray-300/50 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <p class="text-sm font-medium text-[#000000]">
                {{ session('error') }}
            </p>
        </div>
    </div>
@endif
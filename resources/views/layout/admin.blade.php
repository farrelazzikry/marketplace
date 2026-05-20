<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALVERA Control Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#060606] text-zinc-200 antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-[#060606]">
        <x-alert />

        <x-admin.layout.sidebar />

        <div class="flex-1 flex flex-col min-w-0">

            <div class="sticky top-0 z-40">
                <x-admin.layout.navbar />
            </div>

            <main class="p-6 md:p-8 space-y-6">
                <div class="max-w-full">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    {{-- Script Modal Global Tetap Aman --}}
    <script>
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) { el.classList.remove('hidden'); el.classList.add('flex'); }
        }
        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) { el.classList.add('hidden'); el.classList.remove('flex'); }
        }
    </script>
</body>

</html>
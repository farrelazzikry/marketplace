<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>CALVERA Control Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
=======
    <title>Admin Panel — Calvera ID</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
<<<<<<< HEAD
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
=======

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #F3F4F6;
        }

        ::-webkit-scrollbar-thumb {
            background: #D1D5DB;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4B5563;
        }
    </style>
</head>

<body class="bg-[#F3F4F6] text-[#000000] antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        <x-admin.layout.sidebar />

        {{-- MAIN CONTENT --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- NAVBAR --}}
            <x-admin.layout.navbar :title="$title ?? 'Dashboard'" />

            {{-- PAGE CONTENT --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>

    </div>

    <x-alert />
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
</body>

</html>
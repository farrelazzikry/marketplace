<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calvera ID — Premium Curated Showcase</title>

    {{-- Google Fonts: Inter & Playfair Display untuk sentuhan Luxury --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,400&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Custom subtle scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #080808;
        }

        ::-webkit-scrollbar-thumb {
            background: #222222;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #D4AF37;
        }
    </style>
</head>

<body class="bg-[#080808] text-[#E4E4E7] antialiased selection:bg-[#D4AF37]/30 selection:text-white">
    <x-alert />

    <x-user.layout.header />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen">
        @yield('content')
    </main>

    <x-user.layout.footer />
</body>

</html>
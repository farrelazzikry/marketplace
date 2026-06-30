<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calvera ID — Premium Curated Showcase</title>

<<<<<<< HEAD
    {{-- Google Fonts: Inter & Playfair Display untuk sentuhan Luxury --}}
=======
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,400&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<<<<<<< HEAD
=======

>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
<<<<<<< HEAD

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
=======
        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        }
    </style>
</head>

<<<<<<< HEAD
<body class="bg-[#080808] text-[#E4E4E7] antialiased selection:bg-[#D4AF37]/30 selection:text-white">
=======
<body class="bg-[#F3F4F6] text-[#000000] antialiased selection:text-[#000000]">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    <x-alert />

    <x-user.layout.header />

<<<<<<< HEAD
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen">
=======
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 min-h-screen">
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        @yield('content')
    </main>

    <x-user.layout.footer />
<<<<<<< HEAD
=======

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/62895600427052" target="_blank"
        class="fixed bottom-6 right-6 z-50 bg-[#25D366] hover:bg-[#25D366]/70 text-white rounded-full p-4 shadow-2xl transition-transform duration-300 hover:scale-110 flex items-center justify-center group"
        aria-label="Chat via WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
            class="transition-transform duration-300 group-hover:rotate-[-10deg]">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span class="absolute right-full mr-3 px-3 py-1.5 bg-[#111827] text-white text-xs rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none shadow-lg">
            Chat Admin
        </span>
    </a>
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
</body>

</html>
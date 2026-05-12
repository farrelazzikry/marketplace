<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calvera ID</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-[#0F0F0F] text-white font-sans antialiased">

    <x-user.layout.header />

    <main class="max-w-7xl mx-auto px-4 md:px-6 py-10 min-h-screen">
        @yield('content')
    </main>

    <x-user.layout.footer />

</body>

</html>
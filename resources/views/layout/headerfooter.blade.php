<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calvera ID</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0F0F0F] text-white">

    <!-- NAVBAR -->
    <x-header />

    <!-- CONTENT DINAMIS -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <x-footer />

</body>

</html>
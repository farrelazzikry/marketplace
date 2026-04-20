<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Auth</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0D0D0D] text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        @yield('content')
    </div>

</body>

</html>
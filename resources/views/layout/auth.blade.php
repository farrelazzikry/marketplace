<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Center — Calvera ID</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-[#F3F4F6] text-zinc-300 flex items-center justify-center min-h-screen px-4">

    @if(session('success'))
        <div id="toast-success"
            class="fixed top-6 right-6 bg-[#FFFFFF] border border-[#E0E0E0] text-gray-700 px-5 py-3 rounded-xl shadow-2xl z-50 transition-all duration-500 flex items-center gap-3 text-sm font-medium">
            <span class="w-2 h-2 rounded-full bg-gray-600 animate-pulse"></span>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div id="toast-error"
            class="fixed top-6 right-6 bg-[#FFFFFF] border border-[#E0E0E0] text-gray-700 px-5 py-3 rounded-xl shadow-2xl z-50 transition-all duration-500 flex items-center gap-3 text-sm font-medium">
            <span class="w-2 h-2 rounded-full bg-gray-600 animate-pulse"></span>
            {{ session('error') }}
        </div>
    @endif

    <div
        class="w-full max-w-md bg-[#FFFFFF] border border-[#CCCCCC]/60 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
        <div
            class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-gray-500/50 to-transparent">
        </div>
        @yield('content')
    </div>

    <script>
        const handleToast = (id) => {
            const el = document.getElementById(id);
            if (el) {
                setTimeout(() => {
                    el.classList.add('opacity-0', 'translate-y-[-10px]');
                    setTimeout(() => el.remove(), 500);
                }, 3000);
            }
        }
        handleToast('toast-success');
        handleToast('toast-error');
    </script>
</body>

</html>
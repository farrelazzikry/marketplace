<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0D0D0D] text-white">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <x-admin.layout.sidebar />

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col">

            <!-- NAVBAR -->
            <div class="sticky top-0 z-50">
                <x-admin.layout.navbar />
            </div>

            <!-- CONTENT -->
            <main class="p-6 space-y-6">

                <!-- PAGE WRAPPER -->
                <div class="max-w-full">
                    @yield('content')
                </div>

            </main>

        </div>

    </div>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden')
            document.getElementById(id).classList.add('flex')
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden')
            document.getElementById(id).classList.remove('flex')
        }
    </script>
</body>

</html>
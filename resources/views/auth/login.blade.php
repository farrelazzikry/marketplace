<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Calvera ID</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0F0F0F] text-white flex items-center justify-center h-screen">

    <div class="bg-[#1A1A1A] p-10 rounded-xl w-96 shadow-lg">

        <!-- LOGO -->
        <h1 class="text-3xl font-bold text-center mb-6 tracking-widest">
            CALVERA ID
        </h1>

        <h2 class="text-gray-400 text-center mb-6">
            Login ke akun kamu
        </h2>

        <form method="POST" action="/login">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block mb-1 text-gray-400">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:border-gray-400">
            </div>

            <!-- PASSWORD -->
            <div class="mb-6">
                <label class="block mb-1 text-gray-400">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:border-gray-400">
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-gray-300 text-black py-2 rounded-lg hover:bg-white font-semibold">
                Login
            </button>

        </form>

        <!-- LINK REGISTER -->
        <p class="text-center text-gray-400 mt-6">
            Belum punya akun?
            <a href="/register" class="text-white hover:underline">
                Register
            </a>
        </p>

    </div>

</body>

</html>
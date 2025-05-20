<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Found It App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="absolute top-4 right-4 space-x-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600">Log in</a>
            <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-blue-600">Register</a>
        </div>

        <div class="text-center">
            <h1 class="text-4xl font-bold mb-6">Selamat Datang di Found It!</h1>
            <p class="mb-6 text-gray-600">Temukan atau laporkan barang hilang dengan mudah.</p>
            <a href="{{ route('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                Masuk Dashboard
            </a>
        </div>
    </div>
</body>
</html>

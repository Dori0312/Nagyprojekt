<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GreenScreen')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="container mx-auto p-4">

        <!-- Felső gombok a containeren belül -->
        <div class="flex justify-end mb-4 space-x-2">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Bejelentkezés</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Regisztráció</a>
        </div>

        <h1 class="text-center my-6">
            <a href="{{ route('movies.index') }}">
            <img src="{{ asset('pictures/logo.png') }}" 
             alt="Logó" 
             class="logo mx-auto h-20 w-auto hover:opacity-80 transition">
            </a>
        </h1>

        @yield('content')
    </main>
</body>
</html>
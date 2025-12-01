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
        <h1 class="text-center my-6">
            <img src="{{ asset('pictures/logo.png') }}" alt="Logó" class="logo mx-auto" style="max-height: 80px;">
        </h1>

        @yield('content')
    </main>
    
    <footer>
        <p class="text-center text-gray-500 mt-8">Copyright &copy; GreenScreen</p>
    </footer>
</body>
</html>
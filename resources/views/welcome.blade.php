<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>


<body>

<div class="w-full h-screen bg-[url('{{asset("/images/cakes/pexels-abhinav-goswami-291528.jpg")}}')] bg-cover bg-center">
    <div class="w-full h-full flex flex-col justify-center items-center ">
        <h1 class="mt-5 text-center text-4xl text-white font-semibold drop-shadow-lg"><span class="text-yellow-300">Sweepscake 2022</span>
        </h1>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-4xl text-white hover:underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-4xl text-white hover:underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-4xl text-white hover:underline">Register</a>
                @endif
            @endauth
        @endif


    </div>
</div>
</body>
</html>

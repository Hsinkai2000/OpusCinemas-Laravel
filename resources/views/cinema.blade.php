<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opus Cinemas | Cinemas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-secondary mx-16 my-10">
    <x-nav.navbar input='cinema' />

    <div class="flex flex-col w-100 space-y-10 mt-20 items-center">
        @foreach ($cinemas as $cinema)
            <div class="flex flex-col md:flex-row w-3/4">
                <img src="{{ asset($cinema->picture) }}" alt="">
                <div class="flex flex-col justify-center space-y-10 pl-24">
                    <h1 class="text-2xl font-extrabold text-white">{{ $cinema->name }}</h1>
                    <h2 class="text-xl text-white">{{ $cinema->description }}</h2>
                </div>
            </div>
        @endforeach
    </div>

    <x-footer />
</body>

</html>

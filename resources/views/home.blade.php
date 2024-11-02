<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opus Cinemas | Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-secondary mx-16 my-10">
    <x-nav.navbar input='home' />

    <div class="w-full mt-10">
        <div class=" my-5">
            <img src="{{ asset('assets/avatarsplash_screen.png') }}" class="w-full h-30v rounded-3xl object-cover"
                id="splash_screen" />
        </div>

        <hr class="my-5">

        <div class="section flex w-full my-5">
            <div class="section-heading flex w-full text-white">
                <h3 class="text-xl">Now Showing</h3>
                <a href="now_showing.php" class="ms-auto underline">View All</a>
            </div>

        </div>

        <div class='flex flex-wrap'>
            @foreach ($movies as $movie)
                <x-card.card :$movie />
            @endforeach
        </div>
    </div>

    <x-footer />
</body>

</html>

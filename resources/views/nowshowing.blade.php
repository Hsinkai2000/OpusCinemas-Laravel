<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opus Cinemas | Now Showing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-secondary mx-16 my-10">
    <x-nav.navbar input='now showing' />

    <div class="section flex w-full my-5">
        <div class="section-heading flex w-full text-white">
            <h3 class="text-xl">Now Showing</h3>
        </div>

    </div>

    <div class='flex flex-wrap'>
        @foreach ($movies as $movie)
            <x-card.card :$movie />
        @endforeach
    </div>

    <x-footer />
</body>

</html>

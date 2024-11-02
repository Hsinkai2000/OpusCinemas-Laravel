<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opus Cinemas | $movie->name</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-secondary mx-16 my-10">
    <x-nav.navbar input='' />

    <div class="w-full mt-10">

        <x-movie.details :$movie />


        <hr class=' mt-10'>

        <div class='flex justify-between mt-10'>
            <span class=" text-white text-2xl font-bold"> Similar Movies</span>
            <span class="text-white underline text-2xl">View All</span>
        </div>
        <div class='flex flex-wrap'>
            @foreach ($movies as $moviei)
                <x-card.card :movie='$moviei' />
            @endforeach
        </div>
    </div>


    <x-footer />
</body>

</html>

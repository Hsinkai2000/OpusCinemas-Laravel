<div class="card w-1/2 md:w-1/3 lg:w-1/8 px-2 mb-4 transform transition-transform duration-300 hover:scale-110"
    onclick="window.location.href='{{ route('movie_detail', ['id' => $movie->id]) }}'">
    <img src="{{ asset($movie->picture) }}" alt="" class="w-full" />

    <span class="text-white text-center block">{{ $movie->title }}</span>
</div>

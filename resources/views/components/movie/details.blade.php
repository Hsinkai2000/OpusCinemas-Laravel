<div class="text-white flex flex-col md:flex-row w-full px-6 md:px-24">

    <img src="{{ asset($movie->picture) }}" alt="" class="w-100 self-center md:w-1/4">

    <div class="flex flex-col mt-24 w-1/2 px-16 flex-wrap">
        <span class="text-3xl">{{ $movie->title }}</span>

        <div class="flex space-x-5 my-5">
            @foreach ($movie->genre as $genre)
                <span class="px-20 py-3 bg-dark rounded-3xl">{{ $genre->genre }}</span>
            @endforeach
        </div>

        <span class="text-l">{{ $movie->description }}</span>

        <div class="flex space-x-10">
            <button type="submit" onclick="submitForm('{{ route('register.post') }}')"
                class="bg-secondary border border-primary text-primary h-16 w-52 rounded-xl md:mt-10 hover:bg-dark">Watch
                Trailer</button>
            <button type="submit" onclick="submitForm('{{ route('login.post') }}')"
                class="bg-primary text-secondary h-14 w-52 rounded-xl md:mt-10 hover:bg-dark">Book Now</button>
        </div>
    </div>

    <div class="flex md:flex-col mt-14 w-1/4 align-center md:self-center">
        <hr>
        <section class="flex flex-col space-y-5 p-8">
            <span class="text-primary text-xl font-bold">Director</span>
            <span class="text-white text-opacity-60 text-xl">{{ $movie->director }}</span>
        </section>

        <hr>

        <section class="flex flex-col space-y-5 p-8">
            <span class="text-primary text-xl font-bold">Writers</span>
            <span class="text-white text-opacity-60 text-xl">{{ $movie->writers }}</span>
        </section>
        <hr>

        <section class="flex flex-col space-y-5 p-8">
            <span class="text-primary text-xl font-bold">Actors</span>
            <span class="text-white text-opacity-60 text-xl">{{ $movie->actors }}</span>
        </section>
    </div>


</div>

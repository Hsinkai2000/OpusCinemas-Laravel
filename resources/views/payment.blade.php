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

    <div class="w-full mt-10 flex flex-col md:flex-row justify-center text-white">
        <img src="{{ asset($movie->picture) }}" alt=""
            class="movie-image w-1/2 md:w-1/6 object-contain self-center md:self-start" />
        <section class="mt-10 md:mt-16 w-full md:w-2/5 ml-12">

            <h1 class="text-4xl font-bold">{{ $movie->title }}</h1>
            <table class="w-full">
                <tr>
                    <td class="pb-5 pt-10">
                        <h2 class="text-2xl  font-bold">Cinema:</h2>
                    </td>
                    <td class="pb-5 pt-10">
                        <h2 class="text-2xl self-end ">{{ $cinema->name }}</h2>
                    </td>
                </tr>

                <tr>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap font-bold w-1/3">Time Slot:</h2>
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end w-2/3">{{ $timing }}</h2>
                    </td>
                </tr>


                <tr>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap font-bold w-1/3">Seats:</h2>
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end w-2/3">
                            @foreach ($seats as $seat)
                                {{ $seat }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </h2>
                    </td>
                </tr>


                <tr>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap font-bold w-1/3">Price:</h2>
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end">Standard Ticket x {{ count($seats) }}</h2>
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end">$9.00 x {{ count($seats) }}</h2>
                    </td>
                </tr>
                <tr>
                    <td class="pb-5"></td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end">GST 7%</h2>
                    </td>
                    <td class="pb-5">
                        <h2
                            class="text-2xl text-nowrap self-end\">${{ 9 * count($seats) * 0.07 }}</h2>
                    </td>
                </tr>
                <tr>
                    <td class="pb-5">
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end underline">Total</h2>
                    </td>
                    <td class="pb-5">
                        <h2 class="text-2xl text-nowrap self-end\">${{ 9 * count($seats) * 1.07 }}</h2>
                    </td>
                </tr>
            </table>

            <div class='flex flex-col'>
                <h2 class="pb-5
                            pt-5 text-2xl text-nowrap underline">Card Details</h2>
                        <section class="flex space-x-3">
                            <img src="{{ asset('/assets/cards/mastercard.png') }}" class=" h-8" alt="">
                            <img src="{{ asset('/assets/cards/visa.png') }}" class=" h-8" alt="">
                            <img src="{{ asset('/assets/cards/maestro.png') }}" class=" h-8" alt="">
                            <img src="{{ asset('/assets/cards/american_express.png') }}" class=" h-9" alt="">
                        </section>

                        <form class="flex flex-col mt-10 text-xl text-white">
                            <label for="cardname">Name on Card:</label>
                            <input type="text" name="cardname" required
                                class="rounded-xl border border-primary mb-5 p-5 bg-secondary h-12 mt-3"
                                placeholder="Enter your name" id="">

                            <label for="cardno">Card Number:</label>
                            <input type="number" name="cardno" required
                                class="rounded-xl border border-primary p-5 mb-5 bg-secondary h-12 mt-3"
                                placeholder="Enter your card number" id="">

                            <div class="flex w-full">
                                <div class="flex flex-col w-1/2 mr-5">
                                    <label for="date">Expiry Date:</label>
                                    <input type="date" name="date" required
                                        class="rounded-xl border border-primary p-5 mb-5 bg-secondary h-12 mt-3"
                                        placeholder="Enter your Name" id="">
                                </div>
                                <div class="flex flex-col w-1/2 ml-5">
                                    <label for="Security">Security Code:</label>
                                    <input type="number" name="Security" maxlength="3" required
                                        class="rounded-xl border border-primary p-5 mb-5 bg-secondary h-12 mt-3"
                                        placeholder="Enter your CVV" id="">
                                </div>
                            </div>
                            <h2 class="pb-5
                            pt-5 text-2xl text-nowrap underline">Personal
                                Details</h2>

                            <label for="name">Name:</label>
                            <input type="text" name="name" required
                                class="rounded-xl border border-primary mb-5 p-5 bg-secondary h-12 mt-3"
                                placeholder="Enter your name" id="nameInput">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required
                                class="rounded-xl border border-primary mb-5 p-5 bg-secondary h-12 mt-3"
                                placeholder="Enter your email" id="emailInput">
                            <button type="button"
                                onclick="@if (Auth::user()) handleBooking() @else window.location.href='{{ route('login-page') }}'; @endif"
                                class="py-2 rounded-xl bg-primary w-1/4 text-dark mt-5">
                                @if (Auth::user())
                                    Pay
                                @else
                                    Login
                                @endif
                            </button>
                        </form>

    </div>

    </section>
    </div>

    <x-footer />
</body>

<script>
    function handleBooking() {
        const email = document.getElementById("emailInput").value;
        const name = document.getElementById("nameInput").value;

        const params = {
            seats: @json($seats),
            name: name,
            email: email,
            cinema_id: {{ $cinema->id }},
            movie_id: {{ $movie->id }},
            timing: '{{ $timing }}',
        };

        fetch('http://localhost:8000/makebooking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(params)
            })
            .then(response => {
                if (response.status === 200) {
                    alert('Booking has been made!');
                    window.location.href = '{{ route('home') }}';
                } else {
                    alert('Booking failed, please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while making the booking.');
            });
    }
</script>

</html>

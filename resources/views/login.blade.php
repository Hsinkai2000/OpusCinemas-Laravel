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

    <div class="flex flex-col md:flex-row justify-center my-10 items-center text-white">
        <img src="{{ asset('assets/image.png') }}" alt="">
        <div class="flex ml-10 flex-col justify-center">
            <span class="text-2xl font-extrabold">Unlock the door to cinematic extravagance. <br>Log in to your
                exclusive
                movie
                haven</span>


            <form id="authForm" action="{{ route('login.post') }}" method="POST" class="mt-14 text-xl w-100">
                @csrf
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" placeholder="Enter Email"
                    class="w-full bg-secondary border border-primary rounded-xl h-16 my-5 p-5" required>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" placeholder="Enter Password"
                    class="w-full bg-secondary border border-primary rounded-xl h-16 my-5 p-5" required>

                @if (session('error'))
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex justify-between">
                    <button type="submit" onclick="submitForm('{{ route('login.post') }}')"
                        class="bg-primary h-14 w-1/3 rounded-xl mt-10 hover:bg-dark">Login</button>
                    <button type="submit" onclick="submitForm('{{ route('register.post') }}')"
                        class="bg-secondary border border-primary h-16 w-1/3 rounded-xl mt-10 hover:bg-dark">Register</button>
                </div>
            </form>


        </div>

    </div>

    <x-footer />
</body>

<script>
    function submitForm(action) {
        const form = document.getElementById('authForm');
        form.action = action;
    }
</script>

</html>

<nav class="rounded-xl bg-dark text-white flex p-5 ">
    <h1 class="text-white text-xl whitespace-nowrap">Opus Cinemas</h1>
    <div class="justify-center hidden w-full md:flex bg-dark" id="navbar-sticky">
        <ul class="flex flex-row font-medium space-x-5">
            <li>
                <a href="{{ route('home') }}"
                    class="block @if ($input == 'home') text-primary @else text-white @endif hover:text-primary 
                    aria-current="page">Home</a>
            </li>
            <li>
                <a href="{{ route('cinema') }}"
                    class="block @if ($input == 'cinema') text-primary @else text-white @endif  hover:text-primary">Cinemas</a>
            </li>
            <li>
                <a href="{{ route('now_showing') }}"
                    class="block @if ($input == 'now showing') text-primary @else text-white @endif  hover:text-primary">Now
                    Showing</a>
            </li>
        </ul>
    </div>

    <div class="">
        <a href="{{ Auth::user() ? route('logout') : route('login-page') }}"
            class="text-white hover:text-primary
            text-xl">{{ Auth::user() ? Auth::user()->email : 'Login' }}</a>
    </div>
</nav>

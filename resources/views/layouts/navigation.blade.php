<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">{{ $settings->site_name }}</a>

        @if (Auth::check())
        <div class="text-white small">
            Hi, {{ Str::before(Auth::user()->name, ' ') }}
        </div>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('posts') }}">Posts</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">Contact</a>
                </li>
                @guest
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register') }}">
                        <i class="bi bi-person-add"></i>
                        Register
                    </a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
            </ul>
            <x-forms.form method="POST" action="{{route('logout')}}">
                <x-forms.button class="p-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                </x-forms.button>
            </x-forms.form>
            @endauth
        </div>
    </div>
</nav>

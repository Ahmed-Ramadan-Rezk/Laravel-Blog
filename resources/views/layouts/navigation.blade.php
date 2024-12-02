<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">{{ $settings->site_name }}</a>

        @if (Auth::user())
        <div class="text-white small">
            Hi, {{ explode(' ', Auth::user()->name)[0] }}
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
            </ul>

            {{-- Auth Navigation --}}
            @auth
            <x-forms.form method="POST" action="{{route('logout')}}">
                <x-forms.button class="px-2 py-2">Log Out</x-forms.button>
            </x-forms.form>
            @endauth
            {{-- End Auth Navigation --}}
        </div>
    </div>
</nav>

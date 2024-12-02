<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/home-bg.jpg')}})">
            <div class="site-heading">
                <h1>Blogs</h1>
                <span class="subheading">{{ session('logged-in') ?? session('registered') ?? "Let's see some blogs"
                    }}</span>
            </div>
        </x-page-heading>
    </x-slot:header>

    <x-post-card :$posts />

</x-app-layout>

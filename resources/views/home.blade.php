<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/home-bg.jpg')}})">
            <div class="site-heading">
                <h1>Blogs</h1>
                <span class="subheading">Let's See Some Blogs</span>
            </div>
        </x-page-heading>
    </x-slot:header>

    <x-post-card :posts="$posts" />

</x-app-layout>
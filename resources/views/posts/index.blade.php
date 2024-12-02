<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/posts.jpg')}})">
            <div class="site-heading">
                <h1>Posts</h1>
                <span class="subheading">All Posts</span>
            </div>
        </x-page-heading>
    </x-slot:header>

    <x-post-card :$posts />

</x-app-layout>

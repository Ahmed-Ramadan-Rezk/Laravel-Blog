<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/about-bg.jpg')}})">
            <div class="page-heading">
                <h1>About Us</h1>
                <span class="subheading">This is what I do.</span>
            </div>
        </x-page-heading>
    </x-slot:header>

    <p style="white-space: pre-wrap">{{ $settings->about_content }}</p>

</x-app-layout>
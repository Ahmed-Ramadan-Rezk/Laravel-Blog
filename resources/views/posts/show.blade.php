<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/post-bg.jpg')}})">
            <div class="post-heading">
                <h1>{{ $post->title }}</h1>
                <h2 class="subheading">{{ $post->content }}</h2>
                <span class="meta">
                    Posted by
                    <a href="#!">{{ $post->user->name }}</a>
                    on {{ $post->created_at->format('F d, Y') }}
                </span>
            </div>
        </x-page-heading>
    </x-slot:header>


    <!-- Post Content-->
    <article>
        <div class="card-body border border-bottom-0 bg-white p-4">
            <div class="entry-header mb-3">
                <ul class="entry-meta list-unstyled d-flex mb-2">
                    <li class="link-primary">{{ $post->user->name }}</li>
                </ul>
                <h2 class="card-title entry-title h4 mb-0"> {{ $post->title }} </h2>
            </div>
            <p class="card-text entry-summary text-secondary">
                {{ $post->content }}
            </p>
        </div>
        <div class="card border-0">
            <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
                <a href="#!">
                    <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy" src="{{ $post->image }}"
                        alt="Business">
                </a>
            </figure>
            <div class="card-footer border border-top-0 bg-white p-4">
                <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                    <li>
                        <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clock-history" viewBox="0 0 16 16">
                                <path
                                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                                <path
                                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                            </svg>
                            <span class="ms-2 fs-7">{{ $post->created_at->diffForHumans() }}</span>
                        </a>
                    </li>
                    <li>
                        <span class="px-3">&bull;</span>
                    </li>
                    <li>
                        <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-chat-dots" viewBox="0 0 16 16">
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                <path
                                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                            </svg>
                            <span class="ms-2 fs-7">55</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </article>


</x-app-layout>
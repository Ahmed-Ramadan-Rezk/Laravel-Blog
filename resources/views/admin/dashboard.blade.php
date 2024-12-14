<x-admin.app-layout>

    <x-admin.breadcrumb heading="Dashboard" />

    <x-admin.flash-message name="success" />

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    @can('admin')
                    <!-- Posts Card -->
                    <x-admin.card title="Posts" cardClass="sales">
                        <i class="bi bi-collection"></i>
                        <x-slot:count>
                            {{$postsCount}}
                        </x-slot:count>
                    </x-admin.card><!-- End Posts Card -->

                    <!-- Tags Card -->
                    <x-admin.card title="Tags" cardClass="revenue">
                        <i class="bi bi-tags"></i>
                        <x-slot:count>
                            {{$tagsCount}}
                        </x-slot:count>
                    </x-admin.card><!-- End Revenue Card -->

                    <!-- Users Card -->
                    <x-admin.card title="Users" cardClass="customers">
                        <i class="bi bi-people"></i>
                        <x-slot:count>
                            {{$activeUsersCount}}
                        </x-slot:count>
                    </x-admin.card><!-- End Users Card -->
                    @endcan
                </div>

                <!-- Top Talks -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Talks</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Post</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($topTalkPosts as $topOne)
                                    <tr>
                                        <th scope="row"><a href="{{ route('posts.show', $topOne) }}">
                                                <img src="{{ asset($topOne->image) }}" alt="{{ $topOne->title }}"
                                                    loading="lazy">
                                            </a>
                                        </th>
                                        <td><a href="{{ route('users.show', $topOne->user->id) }}"
                                                class="text-primary fw-bold">{{ $topOne->user->name }}</a></td>
                                        <td>{{ $topOne->title }}</td>
                                        <td>{{ \Str::limit($topOne->content, 100, '...') }}</td>
                                        <td>{{ $topOne->updated_at->diffForHumans() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No posts yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $topTalkPosts->links() }}
                        </div>
                    </div>
                </div><!-- End Top Talks -->

            </div><!-- End Left side columns -->

            <!-- News & Updates Traffic -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Updates</h5>
                        @forelse ($posts as $post)
                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" loading="lazy">
                                <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                                <p>{{ \Str::limit($post->content) }}</p>
                            </div>
                        </div><!-- End sidebar recent posts-->
                        @empty
                        <div class="post-item clearfix">
                            <h4>There's no News & Updates</h4>
                        </div>
                        @endforelse

                    </div>
                </div><!-- End News & Updates -->
            </div>
        </div>
    </section>

</x-admin.app-layout>

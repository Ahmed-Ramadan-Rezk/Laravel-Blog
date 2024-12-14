<x-admin.app-layout>

    <x-admin.table-heading heading="Posts" route="{{ route('posts.create') }}">
        Add Post
    </x-admin.table-heading>

    <x-admin.flash-message name="success" />

    <x-admin.table-section>
        <h5 class="card-title">All Posts</h5>

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Author</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edited</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td><img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="50" height="50"
                            loading="lazy">
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                        #{{ $tag->name }}
                        @endforeach
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ \Str::limit($post->content) }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                        @can('update', $post)
                        <a class="btn btn-primary" href="{{ route('posts.edit', $post) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @endcan
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('posts.show', $post) }}">
                            <i class="bi bi-eye text-white"></i>
                        </a>
                    </td>
                    <td>
                        @can('delete', $post)
                        <x-forms.delete-button class="btn btn-danger" :action="route('posts.destroy', $post)">
                            <i class="bi bi-trash3"></i>
                        </x-forms.delete-button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger">No Posts Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Default Table Example -->
        {{ $posts->links() }}
    </x-admin.table-section>
</x-admin.app-layout>

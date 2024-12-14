<x-admin.app-layout>

    <x-admin.table-heading heading="Tags" route="{{ route('tags.create') }}">
        Add Tag
    </x-admin.table-heading>

    <x-admin.flash-message name="success" />

    <x-admin.table-section>
        <h5 class="card-title">All Tags</h5>
        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edited</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                    <td>{{ $tag->updated_at->diffForHumans() }}</td>
                    <td>
                        @can('admin', $tag)
                        <a class="btn btn-primary" href="{{ route('tags.edit', $tag) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @endcan
                    </td>
                    <td>
                        @can('admin', $tag)
                        <x-forms.delete-button class="btn btn-danger" :action="route('tags.destroy', $tag)">
                            <i class="bi bi-trash3"></i>
                        </x-forms.delete-button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger">No Tags Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Default Table Example -->
        {{ $tags->links() }}
    </x-admin.table-section>
</x-admin.app-layout>

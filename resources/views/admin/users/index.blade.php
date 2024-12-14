<x-admin.app-layout>

    <x-admin.table-heading heading="Users" route="{{ route('users.create') }}">
        Add User
    </x-admin.table-heading>

    <x-admin.flash-message name="success" />

    <x-admin.table-section>
        <h5 class="card-title">All Users</h5>

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Edited</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td><img src="{{ asset($user->avatar ?? 'images/avatars/default.png') }}" alt="{{ $user->name }}"
                            width="50" height="50" loading="lazy">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('users.show', $user) }}">
                            <i class="bi bi-eye text-white"></i>
                        </a>
                    </td>
                    <td>
                        <x-forms.delete-button class="btn btn-danger" :action="route('users.destroy', $user)">
                            <i class="bi bi-trash3"></i>
                        </x-forms.delete-button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger">No Users Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Default Table Example -->
        {{ $users->links() }}
    </x-admin.table-section>
</x-admin.app-layout>

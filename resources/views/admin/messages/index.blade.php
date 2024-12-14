<x-admin.app-layout>

    <x-admin.breadcrumb heading="Messages" />

    {{--
    <x-admin.flash-message name="success" /> --}}

    <x-admin.table-section>
        <h5 class="card-title">All Messages</h5>

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $sender)
                <tr>
                    <td>{{ $sender->name }}</td>
                    <td>{{ $sender->email }}</td>
                    <td>{{ $sender->phone }}</td>
                    <td>{{ $sender->message }}</td>
                    <td>{{ $sender->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-danger">No Messages Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </x-admin.table-section>
</x-admin.app-layout>
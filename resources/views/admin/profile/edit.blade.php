<x-admin.app-layout>
    <x-admin.breadcrumb heading="{{ $user->name }}" activeItem="Profile" />

    <x-admin.flash-message name="success" />

    <x-admin.profile.user :$user>

        <x-slot name="tabs">
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                    Profile</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
            </li>
        </x-slot>

        @include('admin.profile.partials.update-profile-information-form')

        @include('admin.profile.partials.update-password-form')

    </x-admin.profile.user>

</x-admin.app-layout>

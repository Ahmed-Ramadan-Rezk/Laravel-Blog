<x-admin.app-layout>

    <x-admin.breadcrumb heading="{{ $user->name }}" item="Users" activeItem="Profile" />

    <x-admin.profile.user :$user>
        <x-slot name="tabs">
            {{-- Only Overview Tab --}}
        </x-slot>
    </x-admin.profile.user>
</x-admin.app-layout>
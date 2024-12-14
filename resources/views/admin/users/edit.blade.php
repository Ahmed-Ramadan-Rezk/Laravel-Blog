<x-admin.app-layout>

    <x-admin.breadcrumb heading="Edit" item="Users" />

    <x-admin.form-section>
        <h5 class="card-title">Edit User</h5>
        <!-- Floating Labels Form -->
        <x-forms.form action="{{ route('users.update', $user) }}" method="POST" class="row g-3"
            enctype="multipart/form-data">
            @method('PATCH')
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="password" name="password" id="floatingpassword" placeholder="password" />
                    <x-forms.label for="floatingpassword">Password</x-forms.label>
                    <x-forms.error name="password" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="password" name="password_confirmation" id="floatingpassword_confirmation"
                        placeholder="password_confirmation" />
                    <x-forms.label for="floatingpassword_confirmation">Confirm Password</x-forms.label>
                    <x-forms.error name="password_confirmation" />
                </x-forms.field>
            </div>
            <div class="col-md-6">
                <x-forms.field>
                    <select name="is_active" class="form-select" id="floatingSelect" aria-label="Activity">
                        <option selected="" value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <x-forms.label for="floatingSelect">Activity</x-forms.label>
                    <x-forms.error name="is_active" />
                </x-forms.field>
            </div>
            <div class="col-md-6">
                <x-forms.field>
                    <select name="is_admin" class="form-select" id="floatingSelect" aria-label="Role">
                        <option selected="" value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                    <x-forms.label for="floatingSelect">Role</x-forms.label>
                    <x-forms.error name="is_admin" />
                </x-forms.field>
            </div>
            <x-forms.button>Save</x-forms.button>
        </x-forms.form><!-- End floating Labels Form -->
    </x-admin.form-section>
</x-admin.app-layout>
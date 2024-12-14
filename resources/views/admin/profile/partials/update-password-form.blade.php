<div class="tab-pane fade pt-3" id="profile-change-password">
    <!-- Change Password Form -->
    <x-forms.form action="{{ route('profile.password') }}" method="POST">
        @method('PATCH')

        <div class="row mb-3">
            <x-forms.label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                Password</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="current_password" type="password" id="current_password" />
                <x-forms.error name="current_password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="password" class="col-md-4 col-lg-3 col-form-label">New
                Password</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="password" type="password" id="password" />
                <x-forms.error name="password" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                Password</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="password_confirmation" type="password" id="password_confirmation" />
                <x-forms.error name="password_confirmation" />
            </div>
        </div>

        <div class="text-center">
            <x-forms.button>Change Password</x-forms.button>
        </div>
    </x-forms.form><!-- End Change Password Form -->
</div>
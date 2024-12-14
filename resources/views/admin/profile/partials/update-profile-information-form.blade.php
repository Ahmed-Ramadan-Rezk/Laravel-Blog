<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <!-- Profile Edit Form -->
    <x-forms.form runat="server" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        <div class="row mb-3">
            <x-forms.label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                Profile Image
                <i class="bi bi-upload"></i>
            </x-forms.label>
            <div class="col-md-8 col-lg-9">
                <img id="image" src="{{ asset($user->avatar ?? 'images/avatars/default.png') }}" alt="Profile"
                    loading="lazy">
                <x-forms.input accept="image/*" name="avatar" type="file" id="profileImage" hidden />
                <x-forms.error name="avatar" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="name" type="text" id="fullName" value="{{ $user->name }}" />
                <x-forms.error name="name" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="about" class="col-md-4 col-lg-3 col-form-label">About</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input field="textarea" name="about" id="about" style="height: 100px">
                    {{ $user->about }}
                </x-forms.input>
                <x-forms.error name="about" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="company" class="col-md-4 col-lg-3 col-form-label">Company</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="company" type="text" id="company" value="{{ $user->company }}" />
                <x-forms.error name="company" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="job" type="text" id="Job" value="{{ $user->job }}" />
                <x-forms.error name="job" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="country" type="text" id="Country" value="{{ $user->country }}" />
                <x-forms.error name="country" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="address" type="text" id="Address" value="{{ $user->address }}" />
                <x-forms.error name="address" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="phone" type="text" id="Phone" value="{{ $user->phone }}" />
                <x-forms.error name="phone" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="email" type="email" id="Email" value="{{ $user->email }}" />
                <x-forms.error name="email" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                Profile</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="twitter" type="text" id="Twitter" value="{{ $user->twitter }}" />
                <x-forms.error name="twitter" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                Profile</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="facebook" type="text" id="Facebook" value="{{ $user->facebook }}" />
                <x-forms.error name="facebook" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                Profile</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="instagram" type="text" id="Instagram" value="{{ $user->instagram }}" />
                <x-forms.error name="instagram" />
            </div>
        </div>

        <div class="row mb-3">
            <x-forms.label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                Profile</x-forms.label>
            <div class="col-md-8 col-lg-9">
                <x-forms.input name="linkedin" type="text" id="Linkedin" value="{{ $user->linkedin }}" />
                <x-forms.error name="linkedin" />
            </div>
        </div>

        <div class="text-center">
            <x-forms.button>Save Changes</x-forms.button>
        </div>
    </x-forms.form><!-- End Profile Edit Form -->

</div>

<script>
    profileImage.onchange = evt => {
  const [file] = profileImage.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}
</script>

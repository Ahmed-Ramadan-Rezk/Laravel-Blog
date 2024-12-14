<x-admin.app-layout>

    <x-admin.breadcrumb heading="Edit" item="Settings" />

    <x-admin.form-section>
        <h5 class="card-title">Edit Settings</h5>
        <!-- Floating Labels Form -->
        <x-forms.form action="{{ route('settings.update', $id = 1) }}" method="POST" class="row g-3"
            enctype="multipart/form-data">
            @method('PATCH')
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="site_name" id="floatingName" placeholder="site_name"
                        value="{{ $settings->site_name ?? old('site_name') }}" />
                    <x-forms.label for="floatingName">Site Name</x-forms.label>
                    <x-forms.error name="site_name" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="file" name="site_logo" id="floatingsite_logo" placeholder="site_logo" />
                    <x-forms.label for="floatingsite_logo">Site Logo</x-forms.label>
                    <x-forms.error name="site_logo" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="facebook" id="floatingfacebook" placeholder="facebook"
                        value="{{ $settings->facebook ?? old('facebook') }}" />
                    <x-forms.label for="floatingfacebook">Facebook</x-forms.label>
                    <x-forms.error name="facebook" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="twitter" id="floatingtwitter" placeholder="twitter"
                        value="{{ $settings->twitter ?? old('twitter') }}" />
                    <x-forms.label for="floatingtwitter">Twitter</x-forms.label>
                    <x-forms.error name="twitter" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="github" id="floatinggithub" placeholder="github"
                        value="{{ $settings->github ?? old('github') }}" />
                    <x-forms.label for="floatinggithub">Github</x-forms.label>
                    <x-forms.error name="github" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="phone" id="floatingphone" placeholder="phone"
                        value="{{ $settings->phone ?? old('phone') }}" />
                    <x-forms.label for="floatingphone">Phone</x-forms.label>
                    <x-forms.error name="phone" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="address" id="floatingaddress" placeholder="address"
                        value="{{ $settings->address ?? old('address') }}" />
                    <x-forms.label for="floatingaddress">Address</x-forms.label>
                    <x-forms.error name="address" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="about_title" id="floatingabout_title" placeholder="about_title"
                        value="{{ $settings->about_title ?? old('about_title') }}" />
                    <x-forms.label for="floatingabout_title">About Title</x-forms.label>
                    <x-forms.error name="about_title" />
                </x-forms.field>
            </div>
            <div class="col-12">
                <x-forms.field>
                    <x-forms.input field="textarea" name="about_content" placeholder="about_content"
                        id="floatingTextarea" style="height: 150px;">{{ $settings->about_content ?? old('about_content')
                        }}</x-forms.input>
                    <x-forms.label for="floatingTextarea">About Content</x-forms.label>
                    <x-forms.error name="about_content" />
                </x-forms.field>
            </div>
            <x-forms.button>Save</x-forms.button>
        </x-forms.form><!-- End floating Labels Form -->
    </x-admin.form-section>
</x-admin.app-layout>
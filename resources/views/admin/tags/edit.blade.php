<x-admin.app-layout>
    <x-admin.breadcrumb heading="Edit" item="Tags" />

    <x-admin.form-section>
        <h5 class="card-title">Edit Tag</h5>
        <!-- Floating Labels Form -->
        <x-forms.form action="{{ route('tags.update', $tag) }}" method="POST" class="row g-3">
            @method('PATCH')
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="name" id="floatingName" placeholder="name"
                        value="{{ $tag->name ?? old('name') }}" />
                    <x-forms.label for="floatingName">Name</x-forms.label>
                    <x-forms.error name="name" />
                </x-forms.field>
            </div>
            <x-forms.button>Save</x-forms.button>
        </x-forms.form><!-- End floating Labels Form -->
    </x-admin.form-section>
</x-admin.app-layout>
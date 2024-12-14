<x-admin.app-layout>

    <x-admin.breadcrumb heading="Create" item="Tags" />

    <x-admin.form-section>
        <h5 class="card-title">Create a New Tag</h5>
        <!-- Floating Labels Form -->
        <x-forms.form action="{{ route('tags.store') }}" method="POST" class="row g-3">
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="name" id="floatingName" placeholder="name"
                        value="{{ old('name') }}" />
                    <x-forms.label for="floatingName">Name</x-forms.label>
                    <x-forms.error name="name" />
                </x-forms.field>
            </div>
            <x-forms.button>Add</x-forms.button>
        </x-forms.form><!-- End floating Labels Form -->
    </x-admin.form-section>
</x-admin.app-layout>
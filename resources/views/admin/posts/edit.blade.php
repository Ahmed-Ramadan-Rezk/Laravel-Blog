<x-admin.app-layout>

    <x-admin.breadcrumb heading="Edit" item="Posts" />

    <x-admin.form-section>
        <h5 class="card-title">Edit Post</h5>
        <!-- Floating Labels Form -->
        <x-forms.form action="{{ route('posts.update', $post) }}" method="POST" class="row g-3"
            enctype="multipart/form-data">
            @method('PATCH')
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="title" id="floatingName" placeholder="title"
                        value="{{ $post->title ?? old('title') }}" />
                    <x-forms.label for="floatingName">Title</x-forms.label>
                    <x-forms.error name="title" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="file" name="image" id="floatingImage" placeholder="image" />
                    <x-forms.label for="floatingImage">Image</x-forms.label>
                    <x-forms.error name="image" />
                </x-forms.field>
            </div>
            <div class="col-md-12">
                <x-forms.field>
                    <x-forms.input type="text" name="tags" id="floatingTags" placeholder="tags"
                        value="{{ $post->tags->pluck('name')->implode(',') ?? '' }}" />
                    <x-forms.label for=" floatingTags">Tags</x-forms.label>
                    <x-forms.error name="tags" />
                </x-forms.field>
            </div>
            <div class="col-12">
                <x-forms.field>
                    <x-forms.input field="textarea" name="content" placeholder="Content" id="floatingTextarea"
                        style="height: 100px;">{{ $post->content ?? old('content') }}</x-forms.input>
                    <x-forms.label for="floatingTextarea">Content</x-forms.label>
                    <x-forms.error name="content" />
                </x-forms.field>
            </div>
            <x-forms.button>Save</x-forms.button>
        </x-forms.form><!-- End floating Labels Form -->
    </x-admin.form-section>
</x-admin.app-layout>
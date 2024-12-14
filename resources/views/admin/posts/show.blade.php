<x-admin.app-layout>

    <x-admin.breadcrumb heading="{{ $post->user->name }}" item="Posts" activeItem="{{ $post->user->name }}'s Post" />

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">
                <!-- Card with an image on bottom -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">
                            @foreach ($post->tags as $tag)
                            <span class="badge bg-primary">#{{ $tag->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <img src="{{ asset($post->image) }}" class="card-img-bottom" alt="{{ $post->title }}"
                        loading="lazy">
                    <div class="d-flex justify-content-between card-footer border border-top-0 bg-white p-4">
                        <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                            <li>
                                <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                    <i class="bi bi-clock-history"></i>
                                    <span class="ms-2 fs-7">{{ $post->updated_at->diffForHumans() }}</span>
                                </a>
                            </li>
                            <li>
                                <span class="px-3">&bull;</span>
                            </li>
                            <li>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="link-secondary text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-chat-dots"></i>
                                    <span
                                        class="ms-2 fs-7 {{ $post->isCommentable() ? 'text-decoration-underline' : '' }}">Comments
                                        {{
                                        $post->comments->count()
                                        }}</span>
                                </a>
                            </li>
                        </ul>
                        @can('create', App\Models\Comment::class)
                        <x-forms.form class="d-flex mt-2" action="{{  route('comments.store', $post) }}" method="POST">
                            <x-forms.field>
                                <x-forms.input id="comment" name="comment" type="text"
                                    placeholder="Leave a comment..." />
                                <x-forms.label for="comment">Leave a comment</x-forms.label>
                            </x-forms.field>
                            <x-forms.button><i class="bi bi-send"></i></x-forms.button>
                        </x-forms.form>
                        @endcan
                    </div>
                    <x-forms.success name="message" />
                    <x-forms.error name="comment" />
                </div><!-- End Card with an image on bottom -->
            </div>
        </div>
    </section>


    {{-- Comments & Replies --}}
    @if ($post->isCommentable())
    <x-modal title="Comments" id="exampleModal">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                <ul class="list-group">
                    @foreach ($post->comments as $comment)
                    <li class="list-group-item mb-4 border rounded">
                        @can('view', $comment)
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Settings</h6>
                                </li>
                                {{-- Edit Comment --}}
                                @can('update', $comment)
                                <x-forms.form class="d-flex dropdown-item"
                                    action="{{ route('comments.update', $comment) }}" method="POST">
                                    @method('PATCH')
                                    <x-forms.field>
                                        <x-forms.input id="comment" name="comment" placeholder="Edit comment here..."
                                            value="{{ $comment->message }}" />
                                        <x-forms.label for="comment">Edit Comment</x-forms.label>
                                    </x-forms.field>
                                    <x-forms.button class="p-1 mt-1">Save</x-forms.button>
                                </x-forms.form>
                                @endcan

                                @can('delete', $comment)
                                <li>
                                    {{-- Delete Comment --}}
                                    <x-forms.delete-button class="dropdown-item"
                                        :action="route('comments.destroy', $comment)">
                                        Delete
                                    </x-forms.delete-button>
                                </li>
                                @endcan
                            </ul>
                        </div>
                        @endcan
                        <div class="d-flex w-100 justify-content-between">
                            <div class="d-flex align-items-center">
                                <figure>
                                    <img src="{{ asset($comment->user->avatar ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png') }}"
                                        alt="{{ $comment->user->name }}" width="50" height="50" class="rounded-circle">
                                </figure>
                                <h6 class="mb-1 px-2">{{ $comment->user->name }}</h6>
                            </div>
                            <small style="font-size: 14px">{{ $comment->updated_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1 mt-0 small">{{ $comment->message }}</p>
                        {{-- --------------------------Replies-------------------------------- --}}
                        @foreach ($comment->replies as $reply)
                        <ul class="mt-3">
                            <li class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <figure>
                                        <img src="{{ asset($reply->user->avatar ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png') }}"
                                            alt="{{ $reply->user->name }}" width="50" height="50"
                                            class="rounded-circle">
                                    </figure>
                                    <h6 class="mb-1 px-2">{{ $reply->user->name }}</h6>
                                </div>
                                <small style="font-size: 14px">{{ $reply->updated_at->diffForHumans() }}</small>
                            </li>
                            <p class="mb-1 mt-0 small">{{ $reply->reply }}</p>
                        </ul>
                        @endforeach
                    </li>
                    @endforeach
                </ul>
                </p>
            </div>
        </div>

        <x-slot:footer>
            @can('create', App\Models\Comment::class)
            <x-forms.form class="d-flex" action="{{  route('comments.store', $post) }}" method="POST">
                <x-forms.field>
                    <x-forms.input id="comment" name="comment" type="text" placeholder="Leave a comment..." />
                    <x-forms.label for="comment">Leave a comment</x-forms.label>
                </x-forms.field>
                <x-forms.button><i class="bi bi-send"></i></x-forms.button>
            </x-forms.form>
            @endcan
        </x-slot:footer>
    </x-modal>
    @endif
</x-admin.app-layout>

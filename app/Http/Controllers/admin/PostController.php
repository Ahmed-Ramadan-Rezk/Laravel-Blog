<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::with('user', 'tags')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['image'] = Storage::disk('public')->put('/images/posts', $request->file('image'));
        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);
        if ($request->has('tags') ?? false) {
            foreach (explode(',', $request->tags) as $tag) {
                $post->tag($tag);
            }
        }
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $post->load('user', 'tags');
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $validated['image'] = Storage::disk('public')->put('/images/posts', $request->file('image'));
        }

        if ($request->has('tags') ?? false) {
            foreach (explode(',', $request->tags) as $tag) {
                foreach ($post->tags as $oldTag) {
                    $post->tags()->detach($oldTag);
                }
                $post->tag($tag);
            }
        }
        $post->update($validated);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);
        $post->tags()->detach();
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}

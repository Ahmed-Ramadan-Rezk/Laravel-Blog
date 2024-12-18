<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Post;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\V1\PostResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\PostRequest;

class PostController extends Controller
{
    use ResponseJson;

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        try {
            $validated['image'] = Storage::disk('public')->put('/images/posts', $request->file('image'));
            $validated['user_id'] = Auth::id();

            $post = Post::create($validated);
            if ($request->has('tags') ?? false) {
                foreach (explode(',', $request->tags) as $tag) {
                    $post->tag($tag);
                }
            }
            $post->save();
            return $this->sendResponse('Post has been created successfully -_-', true, new PostResource($post), 201);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);
        $validated = $request->validated();

        try {
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
            return $this->sendResponse('Post has been updated successfully -_-', true, new PostResource($post), 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->tags()->detach();
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return $this->sendResponse('Post has been deleted successfully -_-', true, null, 200);
    }
}

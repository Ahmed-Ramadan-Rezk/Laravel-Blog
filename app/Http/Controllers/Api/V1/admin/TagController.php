<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Tag;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\admin\TagRequest;
use App\Http\Resources\V1\TagCollection;
use App\Http\Resources\V1\TagResource;

class TagController extends Controller
{
    use ResponseJson;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin', Tag::class);
        $tags = Tag::latest()->paginate(5);
        return new TagCollection($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $validated = $request->validated();
        Gate::authorize('admin', Tag::class);
        try {
            $tag = Tag::create($validated);
            return $this->sendResponse('Tag has been created successfully -_-', true, new TagResource($tag), 201);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong.', false, null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        Gate::authorize('admin', Tag::class);
        return $this->sendResponse('Tag retrieved successfully -_-', true, new TagResource($tag), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validated = $request->validated();
        Gate::authorize('admin', $tag);
        try {
            $tag->update($validated);
            return $this->sendResponse('Tag has been updated successfully -_-', true, new TagResource($tag), 201);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong.', false, null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Gate::authorize('admin', $tag);
        $tag->posts()->detach();
        $tag->delete();
        return $this->sendResponse('Tag has been deleted successfully -_-', true, null, 200);
    }
}

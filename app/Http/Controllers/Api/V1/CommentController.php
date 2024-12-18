<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Models\Comment;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\V1\CommentResource;

class CommentController extends Controller
{

    use ResponseJson;

    public function store(Request $request, Post $post)
    {
        Gate::authorize('create', Comment::class);
        $request->validate([
            'comment' => 'required|min:3|max:1000|string',
        ]);

        try {
            $comment = Comment::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
                'message' => $request->comment
            ]);

            return $this->sendResponse("Comment added successfully -_-", true, new CommentResource($comment), 201);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);
        $request->validate([
            'comment' => 'sometimes|min:3|max:1000|string'
        ]);

        try {
            $comment->update([
                'message' => $request->comment
            ]);

            return $this->sendResponse("Comment updated successfully -_-", true, new CommentResource($comment), 200);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }


    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();
        return $this->sendResponse("Comment deleted successfully -_-", true, null, 200);
    }
}

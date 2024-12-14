<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        Gate::authorize('create', Comment::class);
        $request->validate([
            'comment' => 'required|min:3|max:1000|string'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'message' => $request->comment
        ]);

        return redirect()->back()->with('message', 'Comment added successfully!');
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);
        $request->validate([
            'comment' => 'sometimes|min:3|max:1000|string'
        ]);

        $comment->update([
            'message' => $request->comment
        ]);

        return redirect()->back()->with('message', 'Comment updated successfully!');
    }


    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('message', 'Comment deleted successfully!');
    }
}

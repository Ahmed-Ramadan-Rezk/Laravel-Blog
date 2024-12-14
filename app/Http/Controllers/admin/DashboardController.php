<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $activeUsersCount = User::where('is_active', true)->count();
        $postsCount = Post::count();
        $tagsCount = Tag::count();

        // Get the latest 5 news & updates
        $posts = Post::where('user_id', '!=', Auth::id())->latest()->limit(5)->get();

        // Get the top talk posts
        $topTalkPosts = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('admin.dashboard', compact('activeUsersCount', 'postsCount', 'tagsCount', 'posts', 'topTalkPosts'));
    }
}

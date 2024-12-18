<?php

namespace App\Http\Controllers\Api\V1\admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\V1\PostCollection;

class DashboardController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
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


            return $this->sendResponse('Data fetched successfully -_-', true, [
                'activeUsersCount' => $activeUsersCount,
                'postsCount' => $postsCount,
                'tagsCount' => $tagsCount,
                'latestNews' => new PostCollection($posts),
                'topTalkPosts' => (new PostCollection($topTalkPosts))->response()->getData(true),
            ], 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }
}

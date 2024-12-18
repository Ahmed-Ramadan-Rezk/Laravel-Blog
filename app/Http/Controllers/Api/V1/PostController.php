<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Traits\ResponseJson;

class PostController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
            $posts = Post::with('user', 'tags')->paginate(10);
            return new PostCollection($posts);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }


    public function show(Post $post)
    {
        try {
            $post->load('comments');
            return $this->sendResponse('Post retrieved successfully -_-', true, new PostResource($post));
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }
}

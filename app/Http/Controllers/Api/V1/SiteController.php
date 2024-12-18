<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\SettingResource;
use App\Models\Setting;
use App\Traits\ResponseJson;

class SiteController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
            $posts = Post::with('user')->latest()->simplePaginate(3);
            return new PostCollection($posts);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }

    public function settings()
    {
        try {
            $settings = Setting::first();
            return $this->sendResponse('Settings retrieved successfully -_-', true, new SettingResource($settings));
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\V1\admin;

use App\Models\Message;
use App\Traits\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MessageResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{

    use ResponseJson;

    public function index()
    {
        Gate::authorize('admin', Message::class);
        try {
            $messages = Cache::remember('messages', 60, function () {
                return Message::latest()->get();
            });
            return $this->sendResponse('Messages retrieved successfully -_-', true, MessageResource::collection($messages), 200);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }
}

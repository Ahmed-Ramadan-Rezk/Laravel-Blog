<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\V1\MessageResource;
use App\Traits\ResponseJson;

class ContactController extends Controller
{
    use ResponseJson;

    public function store(MessageRequest $request)
    {
        $validated = $request->validated();
        try {
            $message = Message::create($validated);
            return $this->sendResponse('Message sent successfully -_-', true, new MessageResource($message), 201);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong', false, null, 500);
        }
    }
}

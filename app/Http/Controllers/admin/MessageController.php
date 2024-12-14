<?php

namespace App\Http\Controllers\admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{
    public function index()
    {
        Gate::authorize('admin', Message::class);
        $messages = Cache::remember('messages', 60, function () {
            return Message::latest()->get();
        });
        return view('admin.messages.index', compact('messages'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(MessageRequest $request)
    {
        Message::create($request->validated());

        return to_route('contact')->with('success', 'Your message has been sent successfully.');
    }
}
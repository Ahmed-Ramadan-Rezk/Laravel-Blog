<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->simplePaginate(3);
        return view('home', compact('posts'));
    }
}

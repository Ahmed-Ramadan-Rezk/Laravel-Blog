<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Reply;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $tags = Tag::factory(3)->create();
        Post::factory(100)->hasAttached($tags)->create();
        Comment::factory(100)->create();
        Reply::factory(100)->create();
        Setting::factory(1)->create();
        Message::factory(150)->create();
    }
}

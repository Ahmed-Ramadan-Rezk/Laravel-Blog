<?php

use App\Http\Controllers\{SiteController, AboutController, ContactController, PostController};
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post}', [PostController::class, 'show']);

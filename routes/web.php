<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{SessionController, RegisteredUserController};
use App\Http\Controllers\{SiteController, AboutController, ContactController, PostController, CommentController};

// Auth
Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy')->name('logout');
});

// Site
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show']);

// Comments
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

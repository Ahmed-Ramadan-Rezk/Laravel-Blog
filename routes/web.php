<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{SessionController, RegisteredUserController};
use App\Http\Controllers\{SiteController, AboutController, ContactController, PostController};

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
Route::middleware('auth')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'create'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store']);
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{post}', [PostController::class, 'show']);
});

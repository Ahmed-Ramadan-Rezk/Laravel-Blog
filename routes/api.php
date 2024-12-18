<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\SiteController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\Admin\TagController;
use App\Http\Controllers\Api\V1\Admin\UserController;
use App\Http\Controllers\Api\V1\admin\MessageController;
use App\Http\Controllers\Api\V1\Admin\ProfileController;
use App\Http\Controllers\Api\V1\admin\SettingController;
use App\Http\Controllers\Api\V1\admin\DashboardController;
use App\Http\Controllers\Api\V1\admin\PostController as AdminPostController;
use App\Http\Controllers\Api\V1\Auth\RegisteredUserController;
use App\Http\Controllers\Api\V1\Auth\AuthenticatedSessionController;

// Site Home
Route::get('/', [SiteController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/settings', [SiteController::class, 'settings']);
Route::post('/contact', [ContactController::class, 'store']);


// Login & Register
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    // Comments
    Route::post('/posts/{post}/comment', [CommentController::class, 'store']);
    Route::patch('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);

    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/messages', [MessageController::class, 'index']);
    Route::post('/settings/{id}', [SettingController::class, 'update']);

    // Profile
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword']);

    // Users
    Route::apiResource('/users', UserController::class)->names('admin.users');

    // Posts
    Route::post('/posts', [AdminPostController::class, 'store']);
    Route::post('/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('/posts/{post}', [AdminPostController::class, 'destroy']);

    // Tags
    Route::apiResource('/tags', TagController::class)->names('admin.tags');
});

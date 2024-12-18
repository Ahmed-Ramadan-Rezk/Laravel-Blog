<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\DashboardController;

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Posts
    Route::resource('/posts', PostController::class);

    // Tags
    Route::resource('/tags', TagController::class);

    // Users
    Route::resource('/users', UserController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');

    // Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
});

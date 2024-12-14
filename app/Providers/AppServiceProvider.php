<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::share('settings', Setting::first());
        View::share('messages', Message::whereDate('created_at', now())->latest()->get());

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
    }
}

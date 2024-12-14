<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();

                // Log the inactive user logout attempt
                Log::warning("Inactive user logout", [
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'user_name' => $user->name
                ]);

                return to_route('login')->with('error', 'Your account has been deactivated');
            }
        }

        return $next($request);
    }
}

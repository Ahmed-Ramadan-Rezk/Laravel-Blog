<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request): RedirectResponse
    {
        $user = $request->validated();

        if (!Auth::attempt($user)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials are not match.'
            ]);
        }

        $request->session()->regenerate();

        return to_route('dashboard')->with('logged-in', 'You are now logged in!');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}

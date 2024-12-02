<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {

        $user = $request->validated();

        if (!Auth::attempt($user)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials are not match.'
            ]);
        }

        $request->session()->regenerate();

        return to_route('home')->with('logged-in', 'You are now logged in!');
    }

    public function destroy()
    {
        Auth::logout();
        return to_route('login');
    }
}

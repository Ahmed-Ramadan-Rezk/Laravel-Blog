<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use App\Mail\RegisterMail;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\V1\UserResource;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisteredUserController extends Controller
{
    use ResponseJson;

    public function store(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        try {
            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);
            $token = $user->createToken('auth_token', ['*'], now()->addMinutes());
            Mail::to($user)->send(new RegisterMail);

            return $this->sendResponse('User created successfully -_-', true, [
                'user' => new UserResource($user),
                'token' => $token->plainTextToken,
                'expires_in' => $token->accessToken->expires_at->diffForHumans(now())
            ], 201);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }
}

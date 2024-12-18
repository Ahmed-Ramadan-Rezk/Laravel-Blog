<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\V1\UserResource;
use App\Http\Requests\Auth\LoginUserRequest;

class AuthenticatedSessionController extends Controller
{
    use ResponseJson;

    public function store(LoginUserRequest $request)
    {
        $validated = $request->validated();

        try {
            if (!Auth::attempt($validated)) {
                return $this->sendResponse('Invalid credentials', false, null, 401);
            }

            $token = $request->user()->createToken('auth_token', ['*'], now()->addMinutes());

            return $this->sendResponse('Logged in successfully -_-', true, [
                'user' => new UserResource($request->user()),
                'token' => $token->plainTextToken,
                'expires_in' => $token->accessToken->expires_at->diffForHumans(now())
            ], 200);
        } catch (\Exception $e) {
            return $this->sendResponse("Something went wrong!", false, null, 500);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->sendResponse('Logged out successfully -_-', true, null, 200);
    }
}

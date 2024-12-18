<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\V1\UserResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\UpdateProfileRequest;

class ProfileController extends Controller
{
    use ResponseJson;

    public function update(UpdateProfileRequest $request)
    {

        $validated = $request->validated();

        try {
            if ($request->hasFile('avatar')) {
                $validated['avatar'] = $request->file('avatar')->store('images/avatars', 'public');

                if ($request->user()->avatar) {
                    Storage::disk('public')->delete($request->user()->avatar);
                }
            }

            $request->user()->fill($validated);
            $request->user()->save();

            return $this->sendResponse('Profile updated successfully -_-', true, new UserResource($request->user()), 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
        ]);

        try {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            return $this->sendResponse('Password updated successfully -_-', true, null, 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong!', false, null, 500);
        }
    }
}

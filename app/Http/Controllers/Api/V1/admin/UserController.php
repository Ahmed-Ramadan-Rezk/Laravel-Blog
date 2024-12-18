<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\UserRequest;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;

class UserController extends Controller
{
    use ResponseJson;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin', User::class);
        $users = User::latest()->paginate(10);
        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        Gate::authorize('admin', User::class);
        $validated = $request->validated();

        try {
            $validated['password'] = Hash::make($request->password);
            $validated['avatar'] = Storage::disk('public')->put('/images/avatars', $request->file('avatar')) ?? null;

            $user = User::create($validated);

            return $this->sendResponse('User has been created successfully -_-', true, new UserResource($user), 201);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong.', false, null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('admin', $user);
        return $this->sendResponse('User has been retrieved successfully -_-', true, new UserResource($user), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        Gate::authorize('admin', $user);
        $validated = $request->validated();

        try {
            if ($request->has('password')) {
                $validated['password'] = Hash::make($request->password);
            }

            $user->update($validated);

            return $this->sendResponse('User has been updated successfully -_-', true, new UserResource($user), 200);
        } catch (\Exception $e) {
            return $this->sendResponse('Something went wrong.', false, null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('admin', $user);
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        return $this->sendResponse('User has been deleted successfully -_-', true, null, 200);
    }
}

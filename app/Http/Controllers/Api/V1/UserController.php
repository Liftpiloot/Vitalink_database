<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user)
    {
        return $user;
    }

    // login user
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user === null) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        if (Hash::check($request->password, $user->password)) {
            return $user;
        }
        return response()->json([
            'message' => 'Password is incorrect'
        ], 404);

    }

        public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return UserResource::collection(User::all());
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return UserResource::make($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }

}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(Task::all());
    }

    public function show(User $user)
    {
        return $user;
    }

    public function showByEmailAndPassword(ShowUserRequest $request){
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user === null) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        return UserResource::collection($user);
    }

        public function store(StoreUserRequest $request)
    {
        $task = Task::create($request->validated());

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

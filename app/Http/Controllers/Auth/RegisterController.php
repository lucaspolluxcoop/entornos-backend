<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\UserState;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Traits\CreateUserTrait;

class RegisterController extends Controller
{
    use CreateUserTrait;

    public function register(UserRequest $request)
    {
        $userData = $request->validated();

        if($this->checkFile($userData)) {
            $userData['file_path'] = $request->file('registration_file')->store('', 'users');
        }

        try {
            $this->createUser($userData);

            return new JsonResponse(null,201);

        } catch (\Throwable $error) {

            report($error);

            return new JsonResponse(null,400);
        }
    }
    public function update(User $user, UserRequest $request)
    {
        $userData = $request->validated();

        $userStateId = UserState::VERIFICADO;

        try {
            $user->update([
                'password'          => Hash::make($userData['password']),
                'user_state_id'     => $userStateId
            ]);

            $user->profile->update($userData['profile']);

            return new JsonResponse(null,201);

        } catch (\Throwable $error) {

            report($error);

            return new JsonResponse(null,400);
        }
    }

    private function checkFile($userData)
    {
        return in_array(
            $userData['role_id'],
            [Role::where('name',Role::COLEGIO)->first()->id, Role::where('name',Role::TERCEROS)->first()->id]
        );
    }
}

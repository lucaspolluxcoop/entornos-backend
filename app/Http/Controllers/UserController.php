<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserState;
use App\Queries\UserQuery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResourceCollection;
use App\Http\Controllers\Traits\CreateUserTrait;

class UserController extends Controller
{
    use CreateUserTrait;

    public function index()
    {
        $this->allowsOrAbort('users.index');

        $users = (new UserQuery)->paginate((int)request()->query('perPage', 10));

        return new UserResourceCollection($users);
    }

    public function show(User $user)
    {
        $this->allowsOrAbort('users.show');

        return new UserResource($user->load([
            'role',
            'profile.plate.plateState',
            'profile.economicActivityType',
            'profile.city.state',
            'userState'
        ]));
    }

    public function store(UserRequest $request)
    {
        $this->allowsOrAbort('users.store');

        $userData = $request->validated();

        try {
            $user = $this->createUser($userData);

            return new UserResource($user->load([
                'role',
                'profile.plate.plateState',
                'profile.economicActivityType',
                'profile.city.state',
                'userState'
            ]));

        } catch (\Throwable $error) {

            report($error);

            return new JsonResponse(null,400);
        }
    }

    public function update(User $user, UserRequest $request)
    {
        $this->allowsOrAbort('users.update');

        $userData = $request->validated();

        if($user->role->name == Role::CORREDOR) {

            $user->profile->plate()->updateOrCreate(
                ['profile_id' => $user->profile->id], $userData['profile']['plate']
            );
        }
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id], $userData['profile']
        );

        return new UserResource($user->load([
            'role',
            'profile.plate.plateState',
            'profile.economicActivityType',
            'profile.city.state',
            'userState'
        ]));
    }

    public function updatePassword(User $user, Request $request)
    {
        $this->allowsOrAbort('users.update');

        $userPassword = $request->validate([
            'password' => 'required',
            'oldPassword' => 'required',
        ]);

        if (!Hash::check($userPassword['oldPassword'], $user->password)) {
            return response()->json([
                'errors' => ['La contraseña actual no es correcta']],403);
        }

        $user->update(['password' => bcrypt($request->password)]);

        return new UserResource($user->load([
            'role',
            'profile.plate.plateState',
            'profile.economicActivityType',
            'profile.city.state',
            'userState'
        ]));
    }

    public function destroy(User $user)
    {
        $this->allowsOrAbort('users.destroy');

        abort_if(
            ($user->role->name == Role::SUDO ||
            $user->role->name == Role::ADMIN) , 403
        );

        $user->delete();

        return new JsonResponse(null,200);
    }


    public function approve(User $user)
    {
        $user->update([
            'user_state_id' => UserState::VERIFICADO
        ]);
        return new JsonResponse(null,200);
    }
    public function findUser()
    {
        $user = User::searchBy(request()->get('data'), request()->get('role_id'));

        if(!is_null($user)) {
            return new UserResource($user);
        }
        return new JsonResponse(null,400);
    }
}

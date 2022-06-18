<?php

namespace App\Http\Controllers\Traits;

use App\Models\Role;
use App\Models\User;
use App\Models\UserState;
use Illuminate\Support\Str;
use App\Mail\NewUserCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

trait CreateUserTrait
{
    protected function createUser($userData)
    {
        if($this->isCollege($userData) || $this->isRealStateBroker($userData) || $this->isTenant($userData)) {
            $userStateId = UserState::CREADO;
        } else {
            $userStateId = UserState::VERIFICADO;
        }

        $user = User::create([
            'email'             => $userData['email'],
            'role_id'           => $userData['role_id'],
            'password'          => isset($userData['password']) ? Hash::make($userData['password']) : Hash::make(Str::random(8)),
            'college_id'        => $userData['college_id'] ?? null,
            'college_file_path' => $userData['file_path'] ?? null,
            'user_state_id'     => $userStateId
        ]);

        $user->profile()->create($userData['profile']);

        if($user->role->name == Role::CORREDOR) {
            $user->profile->plate()->create($userData['profile']['plate']);
        }

        if(!isset($userData['password'])) {
            Mail::to($user->email)->send(new NewUserCreated($user));
        }

        return $user;
    }

    private function isCollege($userData)
    {
        return $userData['role_id'] == Role::where('name',Role::COLEGIO)->first()->id;
    }
    private function isRealStateBroker($userData)
    {
        return $userData['role_id'] == Role::where('name',Role::CORREDOR)->first()->id;
    }
    private function isTenant($userData)
    {
        return $userData['role_id'] == Role::where('name',Role::LOCATARIO)->first()->id;
    }
}

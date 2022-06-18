<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordController extends Controller
{

    public function forgot(Request $request) {

        $email = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink($email);

        return $status == Password::RESET_LINK_SENT ? response()->json(__($status)) : response()->json(__($status),403);
    }

    public function reset(Request $request) {

        $request->validate([
            'token'     => 'required',
            'email'     => 'required|email',
            'password'  => 'required|confirmed|min:8'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET ? response()->json(__($status)) : response()->json(__($status),403);
    }
}

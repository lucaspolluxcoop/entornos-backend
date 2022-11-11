<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ProfileObserver
{
    /**
     * Handle the Profile "created" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function created(Profile $profile)
    {
        try {
            $token = Password::createToken($profile->user);
            $profile->user->sendPasswordResetNotification($token);
        }
        catch(Exception $error) {
            return $error;
        }
    }
}

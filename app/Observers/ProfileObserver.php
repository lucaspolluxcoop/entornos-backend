<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\Profile;
use App\Mail\CollegeUserCreated;
use Illuminate\Support\Facades\Mail;

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
        if($this->isCollege($profile)) {
            Mail::to($profile->user->email)->send(new CollegeUserCreated($profile));
        }

        $profile->user->setIdentifier();
    }

    /**
     * Handle the Profile "updated" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function updated(Profile $profile)
    {
        $profile->user->setIdentifier();
    }

    private function isCollege($profile)
    {
        return $profile->user->role->id == Role::where('name',Role::COLEGIO)->first()->id;
    }
}

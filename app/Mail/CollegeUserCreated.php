<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CollegeUserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $profile;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tunota: Creación de Usuario')->markdown('emails.collegeUsers.created')
                    ->with([
                        'profile'      => $this->profile
                    ]);
    }
}

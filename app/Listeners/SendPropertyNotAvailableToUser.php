<?php

namespace App\Listeners;

use App\Events\PropertyNotAvailable;
use App\Mail\ReviewContractState;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPropertyNotAvailableToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PropertyNotAvailable  $event
     * @return void
     */
    public function handle(PropertyNotAvailable $event)
    {
        $returnContract = true;

        $contract = $event->property->isAvailable($event->newContract,null,$returnContract);

        Mail::to($contract->owner->email)->send(new ReviewContractState($contract));
    }
}

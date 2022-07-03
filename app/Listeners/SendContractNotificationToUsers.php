<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ContractNotificationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ContractNotificationsCreated;

class SendContractNotificationToUsers
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
     * @param  ContractNotificationsCreated  $event
     * @return void
     */
    public function handle(ContractNotificationsCreated $event)
    {
        Mail::to($event->contractNotification->user->email)->send(new ContractNotificationCreated($event->contractNotification, $event->contractNotification->user));
    }
}

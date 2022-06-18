<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ContractNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContractNotificationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $contractNotification;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContractNotification $contractNotification, User $user)
    {
        $this->contractNotification = $contractNotification;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tunota: Notificación de Contrato')->markdown('emails.contractNotifications.created')
                    ->with([
                        'contract'  => $this->contractNotification->contract,
                        'user'      => $this->user
                    ]);
    }
}

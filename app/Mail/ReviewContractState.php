<?php

namespace App\Mail;

use App\Models\Contract;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewContractState extends Mailable
{
    use Queueable, SerializesModels;

    public $contract;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tunota: Revisión de Contrato')->markdown('emails.contracts.reviewState')
                    ->with([
                        'owner'                 => $this->contract->owner->profile->first_name . $this->contract->owner->profile->second_name ?? ' ',
                        'contract_identifier'   => $this->contract->contract_identifier,
                        'property_identifier'   => $this->contract->property->property_identifier,

                    ]);
    }
}

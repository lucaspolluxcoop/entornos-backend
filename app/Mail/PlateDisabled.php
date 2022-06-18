<?php

namespace App\Mail;

use App\Models\Plate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PlateDisabled extends Mailable
{
    use Queueable, SerializesModels;

    public $plate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plate $plate)
    {
        $this->plate = $plate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tunota: Edicion de Matricula')->markdown('emails.plate.updated')
                    ->with([
                        'plate'      => $this->plate
                    ]);
    }
}

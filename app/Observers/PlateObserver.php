<?php

namespace App\Observers;

use App\Models\Plate;
use App\Models\UserState;
use App\Mail\PlateEnabled;
use App\Mail\PlateDisabled;
use Illuminate\Support\Facades\Mail;

class PlateObserver
{
    /**
     * Handle the Plate "created" event.
     *
     * @param  \App\Models\Plate  $plate
     * @return void
     */
    public function created(Plate $plate)
    {
        $plate->profile->user->setRealStateBrokerIdentifier();
    }

    public function updated(Plate $plate)
    {
        if($plate->plate_state_id == Plate::INHABILITACION_TEMPORARIA || $plate->plate_state_id == Plate::INHABILITACION_PERMANENTE){
            $plate->profile->user->update([
                'user_state_id' => UserState::INHABILITADO
            ]);
            Mail::to($plate->profile->user)->send(new PlateDisabled($plate));
        }

        if($plate->plate_state_id == Plate::ACTIVA){
            $plate->profile->user->update([
                'user_state_id' => UserState::VERIFICADO
            ]);
            Mail::to($plate->profile->user)->send(new PlateEnabled($plate));
        }

    }
}

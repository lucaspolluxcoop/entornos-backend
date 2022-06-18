<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

Class PlateController extends Controller
{
    public function update(Plate $plate, Request $request)
    {
        $this->allowsOrAbort('plates.update');

        $plateData = $request->validate([
        'number'            => 'required',
        'plate_state_id'    => 'required',
        'expiration_date'   => 'required'
        ]);

        $plate->update($plateData);

        return new JsonResponse(null, 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\PlateState;
use Illuminate\Http\Request;
use App\Http\Resources\PlateStateResourceCollection;

class PlateStateController extends Controller
{
    public function index()
    {
        $plateStates = PlateState::all();

        return new PlateStateResourceCollection($plateStates);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Resources\StateResourceCollection;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('cities')->get();

        return new StateResourceCollection($states);
    }
}

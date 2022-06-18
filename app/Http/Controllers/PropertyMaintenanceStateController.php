<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyMaintenanceState;
use App\Http\Resources\PropertyMaintenanceStateResourceCollection;

class PropertyMaintenanceStateController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('property-maintenance-states.index');

        $states = PropertyMaintenanceState::all();

        return new PropertyMaintenanceStateResourceCollection($states);
    }
}

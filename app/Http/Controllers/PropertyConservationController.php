<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyConservation;
use App\Http\Resources\PropertyConservationResourceCollection;

class PropertyConservationController extends Controller
{
    public function index()
    {
        $propertyConservations = PropertyConservation::all();

        return new PropertyConservationResourceCollection($propertyConservations);
    }
}

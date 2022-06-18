<?php

namespace App\Http\Controllers;

use App\Models\PropertyZone;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyZoneResourceCollection;

class PropertyZoneController extends Controller
{
    public function index()
    {
        $propertyZones = PropertyZone::all();

        return new PropertyZoneResourceCollection($propertyZones);
    }
}

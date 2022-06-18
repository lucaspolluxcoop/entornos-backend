<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyTermination;
use App\Http\Resources\PropertyTerminationResourceCollection;

class PropertyTerminationController extends Controller
{
    public function index()
    {
        $propertyTerminations = PropertyTermination::all();

        return new PropertyTerminationResourceCollection($propertyTerminations);
    }
}

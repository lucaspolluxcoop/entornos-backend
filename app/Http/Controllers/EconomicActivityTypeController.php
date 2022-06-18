<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EconomicActivityType;
use App\Http\Resources\EconomicActivityTypeResourceCollection;

class EconomicActivityTypeController extends Controller
{
    public function index()
    {
        $economicActivityTypes = EconomicActivityType::all();

        return new EconomicActivityTypeResourceCollection($economicActivityTypes);
    }
}

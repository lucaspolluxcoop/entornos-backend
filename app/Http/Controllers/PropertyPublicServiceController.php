<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\PropertyPublicService;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyPublicServiceResourceCollection;

class PropertyPublicServiceController extends Controller
{
    public function index()
    {
        $propertyPublicServices = PropertyPublicService::all();

        return new PropertyPublicServiceResourceCollection($propertyPublicServices);
    }

    public function store(Property $property, Request $request)
    {
        $property->propertyPublicServices()->sync($request->propertyServices);

        return new PropertyResource($property->load([
            'city.state',
            'propertyType.ammenities.ammenityValues',
            'propertyZone',
            'ammenityValues',
            'propertyPublicServices',
            'propertyAntiquity.propertyConservation',
            'propertyAntiquity.propertyTermination',
            'propertyAntiquity.propertyMaintenanceState'
        ]));
    }
}

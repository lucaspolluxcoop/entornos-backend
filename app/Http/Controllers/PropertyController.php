<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Queries\PropertyQuery;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyResourceCollection;

class PropertyController extends Controller
{

    public function index()
    {
        $this->allowsOrAbort('properties.index');

        $properties = (new PropertyQuery)->paginate((int)request()->query('perPage', 10));

        return new PropertyResourceCollection($properties);
    }

    public function show(Property $property)
    {
        $this->allowsOrAbort('properties.show');

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

    public function store(PropertyRequest $request)
    {
        $this->allowsOrAbort('properties.store');

        $property = $request->validated();

        $property = Property::create($property);

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

    public function update(Property $property, PropertyRequest $request)
    {
        $this->allowsOrAbort('properties.update');

        $property->update($request->validated());

        return new PropertyResource($property->load([
            'city.state',
            'propertyType.zones',
            'propertyType.ammenities.ammenityValues',
            'propertyZone',
            'ammenityValues',
            'propertyPublicServices',
            'propertyAntiquity.propertyConservation',
            'propertyAntiquity.propertyTermination',
            'propertyAntiquity.propertyMaintenanceState'
        ]));
    }

    public function destroy(Property $property)
    {
        $this->allowsOrAbort('properties.destroy');

        $property->delete();

        return new JsonResponse(null,200);
    }
}

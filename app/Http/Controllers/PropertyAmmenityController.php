<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\AmmenityValue;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PropertyResource;

class PropertyAmmenityController extends Controller
{
    public function store(Property $property, Request $request)
    {
        $property->ammenityValues()->detach();
        foreach($request->ammenityValues as $ammenityId => $value) {
            if(!is_null($value)) {
                $ammenityValue =  AmmenityValue::firstOrCreate(['property_ammenity_id'=>$ammenityId,'value'=>$value]);
                $property->ammenityValueProperties()->create([
                    'ammenity_value_id'  => $ammenityValue->id,
                ]);
            }
        };

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

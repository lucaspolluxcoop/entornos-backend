<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PropertyAntiquityRequest;

class PropertyAntiquityController extends Controller
{
    public function store(Property $property, PropertyAntiquityRequest $request)
    {
        $antiquity = $request->validated();

        $property->propertyAntiquity()->updateOrCreate(['property_id' => $antiquity['property_id']] , $antiquity);

        return new JsonResponse(null,200);
    }
}

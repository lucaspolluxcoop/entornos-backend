<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyTypeResourceCollection;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::all();

        return new PropertyTypeResourceCollection($propertyTypes->load(['zones']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\WarrantyType;
use Illuminate\Http\Request;
use App\Http\Resources\WarrantyTypeResourceCollection;

class WarrantyTypeController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('warranty-types.index');

        $warrantyTypes = WarrantyType::all();

        return new WarrantyTypeResourceCollection($warrantyTypes);
    }
}

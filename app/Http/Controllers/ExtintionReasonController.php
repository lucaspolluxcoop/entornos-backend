<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExtintionReason;
use App\Http\Resources\ExtintionReasonResourceCollection;

class ExtintionReasonController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('extintion-reasons.index');

        $extintionReasons = ExtintionReason::all();

        return new ExtintionReasonResourceCollection($extintionReasons);
    }
}

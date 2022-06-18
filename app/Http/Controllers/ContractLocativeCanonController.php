<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractLocativeCanon;
use App\Http\Resources\ContractLocativeCanonResourceCollection;

class ContractLocativeCanonController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contract-locative-canons.index');

        $canons = ContractLocativeCanon::all();

        return new ContractLocativeCanonResourceCollection($canons);
    }
}

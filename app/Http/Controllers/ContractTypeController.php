<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use Illuminate\Http\Request;
use App\Http\Resources\ContractTypeResourceCollection;

class ContractTypeController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contract-types.index');

        $contractTypes = ContractType::all();

        return new ContractTypeResourceCollection($contractTypes);
    }
}

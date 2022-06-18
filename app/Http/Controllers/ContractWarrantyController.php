<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContractWarrantyController extends Controller
{
    public function store(Contract $contract, Request $request)
    {
        $this->allowsOrAbort('contract-warranties.store');

        $warrant = $request->get('warrant');

        $key = array_key_first($warrant);

        $contract->warranties()->attach($key, $warrant[$key]);

        return new JsonResponse(null, 200);
    }

    public function update(Contract $contract, Request $request)
    {
        $this->allowsOrAbort('contract-warranties.update');

        $warrant = $request->get('warrant');

        $key = array_key_first($warrant);

        $contract->warranties()->updateExistingPivot($key, $warrant[$key]);

        return new JsonResponse(null, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Resources\UserResourceCollection;

class ContractPartController extends Controller
{
    public function index(Contract $contract)
    {
        $this->allowsOrAbort('contract-parts.index');

        $users = $contract->getUsers();

        return new UserResourceCollection($users);
    }
}

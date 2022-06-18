<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResourceCollection;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return new RoleResourceCollection($roles);
    }
}

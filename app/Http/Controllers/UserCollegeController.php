<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResourceCollection;

class UserCollegeController extends Controller
{
    public function index()
    {
        $role = Role::where('name',Role::COLEGIO)->first();
        $colleges = User::with(['profile.city.state'])->where('role_id',$role->id)->get();

        return new UserResourceCollection($colleges);
    }
}

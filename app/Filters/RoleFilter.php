<?php

namespace App\Filters;

use App\Models\Role;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class RoleFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value == Role::COLEGIO) {
            $query->where('users.college_id', Auth::id());
        }
        if ($value == Role::CORREDOR) {
            $ownUsers = Auth::user()->getOwnUsers();

            $query->whereHas('role', function($query) use($ownUsers){
                $query->where('name', Role::LOCADOR)
                    ->orWhere('name', Role::LOCATARIO)
                    ->orWhere('name', Role::GARANTE)
                    ->whereIn('users.id',$ownUsers);
                });
        }
    }
}

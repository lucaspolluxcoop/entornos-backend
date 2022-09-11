<?php

namespace App\Filters;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ContractOwnerFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (Auth::user()->role->name == Role::CORREDOR) {
            $query->where('contracts.owner_id', $value);
        }
    }
}

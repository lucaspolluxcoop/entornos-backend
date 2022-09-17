<?php

namespace App\Filters;

use App\Models\Role;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class PropertyUserFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (Auth::user()->role->name == Role::CORREDOR) {
            $ownProperties = Auth::user()->getOwnProperties();
            $query->whereIn('properties.id', $ownProperties);
        }
    }
}

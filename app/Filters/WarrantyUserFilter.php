<?php

namespace App\Filters;

use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class WarrantyUserFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $ownWarranties = Auth::user()->getOwnWarranties();
        $query->whereHas('user', function($query) use($ownWarranties) {
            $query->whereIn('users.id', $ownWarranties);
        });
    }
}

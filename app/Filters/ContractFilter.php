<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ContractFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->where('contract_identifier', 'like', "%{$value}%")
            ->orWhereHas('contractType', function ($query) use ($value) {
                $query->where('title', 'like', "%{$value}%");
            })
            ->orWhereHas('property', function ($query) use ($value) {
                $query->where('property_identifier', 'like', "%{$value}%");
            })
            ->orWhereHas('tenant', function ($query) use ($value) {
                $query->whereHas('profile', function($query) use ($value) {
                    $query->whereRaw("CONCAT(first_name,' ',last_name) like '%${value}%'");
                });
            });
    }
}

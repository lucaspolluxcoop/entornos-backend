<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ContractPartFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->where('contracts.owner_id',$value)
            ->orWhere('contracts.tenant_id',$value)
            ->orWhere('contracts.locator_id',$value);
    }
}

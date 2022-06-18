<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class WarrantyFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->where('title', 'like', "%{$value}%")
            ->orWhereHas('warrantyType', function ($query) use ($value) {
                $query->where('title', 'like', "%{$value}%");
            });
    }
}

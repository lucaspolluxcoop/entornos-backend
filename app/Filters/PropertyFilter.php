<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PropertyFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->where('street', 'like', "%{$value}%")
            ->orWhere('number', 'like', "%{$value}%")
            ->orWhere('property_identifier', 'like', "%{$value}%")
            ->orWhereHas('propertyType', function($query) use($value) {
                $query->where('title', 'like', "%{$value}%");
            })
            ->orWhereHas('city', function ($query) use ($value) {
              $query->where('title', 'like', "%{$value}%")
                    ->orWhereHas('state', function($query) use($value) {
                        $query->where('name', 'like', "%{$value}%");
                    });
            });
    }
}

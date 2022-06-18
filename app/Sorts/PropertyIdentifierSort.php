<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class PropertyIdentifierSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('properties','properties.id','=','contracts.property_id')
            ->orderBy("properties.property_identifier",$direction);
    }
}

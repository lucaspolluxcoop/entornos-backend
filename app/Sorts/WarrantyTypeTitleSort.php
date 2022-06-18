<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class WarrantyTypeTitleSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('warranty_types','warranty_types.id','=','warranties.warranty_type_id')
            ->orderBy("warranty_types.title",$direction);
    }
}

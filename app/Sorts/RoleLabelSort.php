<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class RoleLabelSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('roles','roles.id','=','users.role_id')
            ->orderBy("roles.label",$direction);
    }
}

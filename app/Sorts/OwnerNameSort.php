<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class OwnerNameSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('profiles','profiles.user_id','=','contract.owner_id')
            ->orderBy("profiles.denomination",$direction);
    }
}

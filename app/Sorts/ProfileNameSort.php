<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class ProfileNameSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('profiles','profiles.user_id','=','users.id')
            ->orderBy("profiles.name",$direction);
    }
}

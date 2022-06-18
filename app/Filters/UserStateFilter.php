<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UserStateFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->whereHas('userState', function ($query) use ($value) {
                $query->where('user_states.id',$value);
            });
    }
}

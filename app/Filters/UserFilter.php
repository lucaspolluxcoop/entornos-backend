<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UserFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {

        $query->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->selectRaw('users.*')
            ->where( function ($query) use ($value) {
                $query->where('users.identifier_code', 'like', "%{$value}%")
                    ->orWhere('users.email', 'like', "%{$value}%")
                    ->orWhere('profiles.denomination', 'like', "%{$value}%")
                    ->orWhere('profiles.cuit', 'like', "%{$value}%");
                });
    }
}

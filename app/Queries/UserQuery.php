<?php

namespace App\Queries;

use App\Models\User;
use App\Filters\UserFilter;
use App\Sorts\RoleLabelSort;
use App\Sorts\ProfileNameSort;
use App\Filters\UserStateFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class UserQuery extends QueryBuilder
{
    public function __construct()
    {
        /* Load base relationships, contrains or joins */
        $usersQuery = User::query()->with(['role','profile.city.state','profile.plate.plateState']);

        parent::__construct($usersQuery);

        /*  Define filters, sorts, includes and appends */
		$this
			->defaultSort('-users.id')
            ->allowedSorts([
				AllowedSort::field('id', 'users.id'),
				AllowedSort::field('email', 'users.email'),
				AllowedSort::field('identifierCode', 'users.identifier_code'),
				AllowedSort::custom('profile.name', new ProfileNameSort(), 'name'),
				AllowedSort::custom('role.label', new RoleLabelSort(), 'label')
            ])
            ->allowedFilters([
                AllowedFilter::custom('search', new UserFilter),
                AllowedFilter::exact('college', 'users.college_id'),
                AllowedFilter::custom('userState', new UserStateFilter),
                AllowedFilter::exact('role', 'users.role_id'),
            ]);
    }
}

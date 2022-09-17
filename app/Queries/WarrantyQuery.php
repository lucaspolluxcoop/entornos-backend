<?php

namespace App\Queries;

use App\Models\Warranty;
use App\Filters\WarrantyFilter;
use App\Filters\WarrantyUserFilter;
use App\Sorts\WarrantyTypeTitleSort;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class WarrantyQuery extends QueryBuilder
{
    public function __construct()
    {
        /* Load base relationships, contrains or joins */
        $warrantiesQuery = Warranty::query()->with(['warrantyType','user.profile']);

        parent::__construct($warrantiesQuery);

        /*  Define filters, sorts, includes and appends */
        $this
            ->defaultSort('-id')
            ->allowedSorts([
                AllowedSort::field('id', 'warranties.id'),
                AllowedSort::field('name', 'warranties.title'),
                AllowedSort::custom('warrantyType.title', new WarrantyTypeTitleSort(), 'title'),
            ])
            ->allowedFilters([
                AllowedFilter::exact('warrantyType', 'warranties.warranty_type_id'),
                AllowedFilter::custom('search', new WarrantyFilter),
                AllowedFilter::custom('user', new WarrantyUserFilter)
            ]);
    }
}

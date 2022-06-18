<?php

namespace App\Queries;

use App\Models\Property;
use App\Filters\PropertyFilter;
use App\Sorts\PropertyTypeSort;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PropertyQuery extends QueryBuilder
{
    public function __construct()
    {
        /* Load base relationships, contrains or joins */
        $propertiesQuery = Property::query()->with(['city.state','propertyType','propertyZone']);

        parent::__construct($propertiesQuery);

        /*  Define filters, sorts, includes and appends */
        $this
            ->defaultSort('-id')
            ->allowedSorts([
				AllowedSort::field('id', 'properties.id'),
				AllowedSort::field('street', 'properties.street'),
				AllowedSort::field('number', 'properties.number'),
				AllowedSort::custom('propertyType.title', new PropertyTypeSort(), 'title'),
			])
            ->allowedFilters([
                AllowedFilter::exact('propertyType', 'properties.property_type_id'),
                AllowedFilter::custom('search', new PropertyFilter)
            ]);
    }
}

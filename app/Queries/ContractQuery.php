<?php

namespace App\Queries;

use App\Models\Contract;
use App\Sorts\OwnerNameSort;
use App\Filters\ContractFilter;
use App\Filters\ContractPartFilter;
use App\Filters\ContractOwnerFilter;
use App\Sorts\ContractTypeTitleSort;
use Spatie\QueryBuilder\AllowedSort;
use App\Sorts\PropertyIdentifierSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ContractQuery extends QueryBuilder
{
    public function __construct()
    {
        /* Load base relationships, contrains or joins */
        $contractsQuery = Contract::query()->with(['contractType', 'property', 'owner.profile', 'tenant.profile', 'locator.profile']);

        parent::__construct($contractsQuery);

        /*  Define filters, sorts, includes and appends */
        $this
            ->defaultSort('-id')
            ->allowedSorts([
                AllowedSort::field('id', 'contracts.id'),
                AllowedSort::field('startContract', 'contracts.start_contract'),
                AllowedSort::field('endContract', 'contracts.end_contract'),
                AllowedSort::field('premium', 'contracts.premium'),
                AllowedSort::custom('contractType.title', new ContractTypeTitleSort(), 'title'),
                AllowedSort::custom('owner.name', new OwnerNameSort(), 'name'),
                AllowedSort::custom('property.propertyIdentifier', new PropertyIdentifierSort(), 'propertyIdentifier'),
            ])
            ->allowedFilters([
                AllowedFilter::exact('contractType', 'contracts.contract_type_id'),
                AllowedFilter::custom('search', new ContractFilter),
                AllowedFilter::custom('part', new ContractPartFilter),
                AllowedFilter::custom('owner', new ContractOwnerFilter)
            ]);
    }
}

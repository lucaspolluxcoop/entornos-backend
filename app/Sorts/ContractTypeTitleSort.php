<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class ContractTypeTitleSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC': 'ASC';
        $query->join('contract_types','contract_types.id','=','contract.contract_type_id')
            ->orderBy("contract_types.title",$direction);
    }
}

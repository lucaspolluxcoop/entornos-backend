<?php

namespace App\Queries;

use App\Models\Contract;
use App\Models\ContractNotification;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Filters\ContractNotificationFilter;

class ContractNotificationQuery extends QueryBuilder
{
    public function __construct(Contract $contract)
    {
        /* Load base relationships, contrains or joins */
        $contractNotificationsQuery = ContractNotification::query()
            ->with(['contractNotificationCategory', 'contract', 'contractNotificationResponse', 'reason', 'user.profile'])
            ->where('contract_id', $contract->id);

        parent::__construct($contractNotificationsQuery);

        /*  Define filters, sorts, includes and appends */
        $this
            ->defaultSort('-id')
            ->allowedSorts([
                AllowedSort::field('id', 'contract_notifications.id'),
                AllowedSort::field('notificationDate', 'contract_notifications.notification_date'),
            ])
            ->allowedFilters([
                AllowedFilter::custom('search', new ContractNotificationFilter)
            ]);
    }
}

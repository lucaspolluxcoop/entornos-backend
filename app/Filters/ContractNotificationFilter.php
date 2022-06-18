<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ContractNotificationFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query
            ->where('notificationDate', 'like', "%{$value}%")
            ->orWhereHas('contractNotificationCategory', function ($query) use ($value) {
                $query->where('title', 'like', "%{$value}%");
            })
            ->orWhereHas('reason', function ($query) use ($value) {
                $query->where('title', 'like', "%{$value}%");
            })
            ->orWhereHas('contractNotificationResponse', function ($query) use ($value) {
                $query->where('title', 'like', "%{$value}%");
            })
            ->orWhereHas('firstPart', function ($query) use ($value) {
                $query->whereHas('profile', function($query) use ($value) {
                    $query->where('name', 'like', "%{$value}%");
                });
            })
            ->orWhereHas('secondPart', function ($query) use ($value) {
                $query->whereHas('profile', function($query) use ($value) {
                    $query->where('name', 'like', "%{$value}%");
                });
            });
    }
}

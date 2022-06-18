<?php

namespace App\Models;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContractNotificationCategory;
use App\Models\ContractNotificationResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractNotification extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function contractNotificationCategory()
    {
        return $this->belongsTo(ContractNotificationCategory::class);
    }

    public function contractNotificationResponse()
    {
        return $this->belongsTo(ContractNotificationResponse::class);
    }

    public function reason()
    {
        return $this->belongsTo(ContractNotificationCategory::class, 'reason_id');
    }

    public function firstPart()
    {
        return $this->belongsTo(User::class, 'first_part_id')->withTrashed();
    }

    public function secondPart()
    {
        return $this->belongsTo(User::class, 'second_part_id')->withTrashed();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}

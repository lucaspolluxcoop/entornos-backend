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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}

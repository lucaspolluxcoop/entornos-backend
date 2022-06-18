<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contract;
use App\Models\NotificationReason;
use App\Models\NotificationResponse;
use App\Models\NotificationManagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'identifier',
        'contract_id',
        'other_reason',
        'notification_management_id',
        'notification_reason_id',
        'user_id',
        'notification_response_id'
    ];

    public function notificationManagement()
    {
        return $this->belongsTo(NotificationManagement::class);
    }
    public function notificationReason()
    {
        return $this->belongsTo(NotificationReason::class);
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notificationResponse()
    {
        return $this->belongsTo(NotificationResponse::class);
    }

    public function setIdentifier()
    {
        $this->identifier = $this->contract->contract_identifier . sprintf("%02d", $this->id);

        $this->save();
    }

    public static function findNotificationPending($request)
    {
        return Notification::where('contract_id', $request['contract_id'])
            ->where('notification_reason_id', $request['notification_reason_id'])
            ->where('notification_management_id', $request['notification_management_id'])
            ->whereNull('notification_response_id')
            ->exists();
    }
}

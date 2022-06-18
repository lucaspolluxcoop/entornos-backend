<?php

namespace App\Models;

use App\Models\Role;
use App\Models\NotificationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationReason extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'notification_type_id',
        'role_id'
    ];

    public const NOTIFICATION_OTHER_REASONS = [4, 13, 19, 23, 32, 38];

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

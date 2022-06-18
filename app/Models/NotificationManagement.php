<?php

namespace App\Models;

use App\Models\NotificationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'notification_type_id',
    ];

    public $table = 'notification_managements';

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class);
    }
}

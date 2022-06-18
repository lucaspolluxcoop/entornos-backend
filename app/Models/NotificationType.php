<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function reasons()
    {
        return $this->hasMany(NotificationReason::class);
    }
    public function managements()
    {
        return $this->hasMany(NotificationManagement::class);
    }
}

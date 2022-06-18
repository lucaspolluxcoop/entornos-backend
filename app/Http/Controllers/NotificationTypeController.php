<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationType;
use App\Http\Resources\NotificationTypeResourceCollection;

class NotificationTypeController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('notification-types.index');

        $notificationTypes = NotificationType::with(['reasons.role','managements'])->get();

        return new NotificationTypeResourceCollection($notificationTypes);
    }
}

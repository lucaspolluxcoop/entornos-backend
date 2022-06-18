<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\NotificationReason;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function show(Notification $notification)
    {
        $this->allowsOrAbort('notifications.show');

        return new NotificationResource($notification->load([
            'contract',
            'notificationManagement.notificationType',
            'notificationReason.role',
            'user.profile',
            'notificationResponse'
        ]));
    }

    public function store(NotificationRequest $request)
    {
        $this->allowsOrAbort('notifications.store');

        $notificationData = $request->validated();

        if(Notification::findNotificationPending($notificationData)) {
            return response()->json([
                'errors' => [("Ya existe un reclamo del mismo tipo sin una respuesta")]
            ],400);
        }

        $notification = Notification::create($notificationData);

        return new NotificationResource($notification->load([
            'contract',
            'notificationManagement.notificationType',
            'notificationReason.role',
            'user.profile',
            'notificationResponse'
        ]));
    }

    public function update(Notification $notification, NotificationRequest $request)
    {
        $this->allowsOrAbort('notifications.update');

        $notificationData = $request->validated();

        $notification->update($notificationData);

        return new NotificationResource($notification->load([
            'contract',
            'notificationManagement.notificationType',
            'notificationReason.role',
            'user.profile',
            'notificationResponse'
        ]));
    }
}

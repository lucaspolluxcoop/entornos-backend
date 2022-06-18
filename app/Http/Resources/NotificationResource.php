<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\ContractResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\NotificationReasonResource;
use App\Http\Resources\NotificationResponseResource;
use App\Http\Resources\NotificationManagementResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'identifier'    => $this->identifier,
            'otherReason'    => $this->other_reason,
            'contract' => ContractResource::make($this->whenLoaded('contract')),
            'notificationManagement' => NotificationManagementResource::make($this->whenLoaded('notificationManagement')),
            'notificationReason' => NotificationReasonResource::make($this->whenLoaded('notificationReason')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'notificationResponse' => NotificationResponseResource::make($this->whenLoaded('notificationResponse'))
        ];
    }
}

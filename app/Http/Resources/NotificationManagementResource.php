<?php

namespace App\Http\Resources;

use App\Models\NotificationType;
use App\Http\Resources\NotificationTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationManagementResource extends JsonResource
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
            'id'                => $this->id,
            'title'             => $this->title,
            'notificationType'  => NotificationTypeResource::make($this->whenLoaded('notificationType'))
        ];
    }
}

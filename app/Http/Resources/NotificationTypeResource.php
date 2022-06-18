<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\NotificationReasonResource;
use App\Http\Resources\NotificationManagementResource;

class NotificationTypeResource extends JsonResource
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
            'id'            => $this->id,
            'title'         => $this->title,
            'reasons'       => NotificationReasonResource::collection($this->whenLoaded('reasons')),    
            'managements'   => NotificationManagementResource::collection($this->whenLoaded('managements'))
        ];
    }
}

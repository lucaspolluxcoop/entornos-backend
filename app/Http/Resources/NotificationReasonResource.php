<?php

namespace App\Http\Resources;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationReasonResource extends JsonResource
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
            'id'    => $this->id,
            'title' => $this->title,
            'role'  => RoleResource::make($this->whenLoaded('role'))
        ];
    }
}

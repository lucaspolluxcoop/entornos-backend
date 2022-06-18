<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\ContractResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ContractNotificationCategoryResource;
use App\Http\Resources\ContractNotificationResponseResource;

class ContractNotificationResource extends JsonResource
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
            'id'                            => $this->id,
            'notificationDate'              => $this->notification_date,
            'responseDate'                  => $this->response_date,
            'contract'                      => ContractResource::make($this->whenLoaded('contract')),
            'reason'                        => ContractNotificationCategoryResource::make($this->whenLoaded('reason')),
            'firstPart'                     => UserResource::make($this->whenLoaded('firstPart')),
            'secondPart'                    => UserResource::make($this->whenLoaded('secondPart')),
            'contractNotificationCategory'  => ContractNotificationCategoryResource::make($this->whenLoaded('contractNotificationCategory')),
            'contractNotificationResponse'  => ContractNotificationResponseResource::make($this->whenLoaded('contractNotificationResponse')),
        ];
    }
}

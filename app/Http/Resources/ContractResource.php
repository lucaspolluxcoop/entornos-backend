<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\WarrantyResource;
use App\Http\Resources\ContractTypeResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\ExtintionReasonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ContractNotificationResource;
use App\Http\Resources\ContractLocativeCanonResource;

class ContractResource extends JsonResource
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
            'id'                    => $this->id,
            'startContract'         => $this->start_contract,
            'endContract'           => $this->end_contract,
            'contractIdentifier'    => $this->contract_identifier,
            'extintionDate'         => $this->extintion_date,
            'contractIdentifier'    => $this->contract_identifier,
            'extintionReason'       => ExtintionReasonResource::make($this->whenLoaded('extintionReason')),
            'otherReason'           => $this->other_reason,
            'finishedContract'      => $this->finished_contract,
            'renewedContract'       => $this->renewed_contract,
            'extendedContract'      => $this->extended_contract,
            'contractLocativeCanon' => ContractLocativeCanonResource::make($this->whenLoaded('contractLocativeCanon')),
            'contractType'          => ContractTypeResource::make($this->whenLoaded('contractType')),
            'owner'                 => UserResource::make($this->whenLoaded('owner')),
            'tenant'                => UserResource::make($this->whenLoaded('tenant')),
            'locator'               => UserResource::make($this->whenLoaded('locator')),
            'property'              => PropertyResource::make($this->whenLoaded('property')),
            'warranties'            => WarrantyResource::collection($this->whenLoaded('warranties')),
            'contractNotifications' => ContractNotificationResource::collection($this->whenLoaded('contractNotifications')),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyTerminationResource;
use App\Http\Resources\PropertyConservationResource;
use App\Http\Resources\PropertyMaintenanceStateResource;

class PropertyAntiquityResource extends JsonResource
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
            'id'                        => $this->id,
            'propertyId'                => $this->property_id,
            'antiquity'                 => $this->antiquity,
            'propertyConservation'      => PropertyConservationResource::make($this->whenLoaded('propertyConservation')),
            'propertyTermination'       => PropertyTerminationResource::make($this->whenLoaded('propertyTermination')),
            'propertyMaintenanceState'  => PropertyMaintenanceStateResource::make($this->whenLoaded('propertyMaintenanceState')),
            'deliveredPainted'          => $this->delivered_painted
        ];
    }
}

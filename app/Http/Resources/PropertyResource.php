<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use App\Http\Resources\PropertyTypeResource;
use App\Http\Resources\PropertyZoneResource;
use App\Http\Resources\AmmenityValueResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyAntiquityResource;
use App\Http\Resources\PropertyPublicServiceResource;

class PropertyResource extends JsonResource
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
            'street'                    => $this->street,
            'number'                    => $this->number,
            'floor'                     => $this->floor,
            'apartment'                 => $this->apartment,
            'area'                      => $this->area,
            'city'                      => CityResource::make($this->whenLoaded('city')),
            'neightbourhood'            => $this->neightbourhood,
            'zip'                       => $this->zip,
            'propertyIdentifier'        => $this->property_identifier,
            'ownerTaxId'                => $this->owner_tax_id,
            'propertyType'              => PropertyTypeResource::make($this->whenLoaded('propertyType')),
            'propertyZone'              => PropertyZoneResource::make($this->whenLoaded('propertyZone')),
            'ammenityValues'            => AmmenityValueResource::collection($this->whenLoaded('ammenityValues')),
            'propertyPublicServices'    => PropertyPublicServiceResource::collection($this->whenLoaded('propertyPublicServices')),
            'propertyAntiquity'         => PropertyAntiquityResource::make($this->whenLoaded('propertyAntiquity'))
        ];
    }
}

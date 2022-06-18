<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use App\Http\Resources\PlateResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EconomicActivityTypeResource;

class ProfileResource extends JsonResource
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
            'firstName'                     => $this->first_name,
            'lastName'                      => $this->last_name,
            'denomination'                  => $this->denomination,
            'district'                      => $this->district,
            'cuit'                          => $this->cuit,
            'phone'                         => $this->phone,
            'cellPhone'                     => $this->cell_phone,
            'economicActivityType'          => EconomicActivityTypeResource::make($this->whenLoaded('economicActivityType')),
            'otherEconomicActivityTypeName' => $this->other_economic_activity_type_name,
            'website'                       => $this->website,
            'cityId'                        => $this->city_id,
            'city'                          => CityResource::make($this->whenLoaded('city')),
            'zip'                           => $this->zip,
            'street'                        => $this->street,
            'number'                        => $this->number,
            'floor'                         => $this->floor,
            'apartment'                     => $this->apartment,
            'neighbourhood'                 => $this->neighbourhood,
            'familyGroupAdults'             => $this->family_group_adults,
            'familyGroupUnderAge'           => $this->family_group_under_age,
            'plate'                         => PlateResource::make($this->whenLoaded('plate')),
            'dni'                           => $this->dni,
            'businessName'                  => $this->business_name,
            'nationality'                   => $this->nationality
        ];
    }
}

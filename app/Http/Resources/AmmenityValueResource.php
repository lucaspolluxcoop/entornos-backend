<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AmmenityValueResource extends JsonResource
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
            'propertyAmmenityId'  => $this->property_ammenity_id,
            'value'                 => $this->value
        ];
    }
}

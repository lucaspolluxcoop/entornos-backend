<?php

namespace App\Http\Resources;

use App\Http\Resources\PropertyZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyAmmenitiesResource;

class PropertyTypeResource extends JsonResource
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
            'value'         => $this->value,
            'title'         => $this->title,
            'description'   => $this->description,
            'zones'         => PropertyZoneResource::collection($this->whenLoaded('zones')),
            'ammenities'    => PropertyAmmenitiesResource::collection($this->whenLoaded('ammenities')),
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Http\Resources\AmmenityValueResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyAmmenitiesResource extends JsonResource
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
            'value'             => $this->value,
            'title'             => $this->title,
            'description'       => $this->description,
            'type'              => $this->type,
            'extraData'         => $this->extra_data,
            'ammenityValues'    => $this->type == 'list' ? AmmenityValueResource::collection($this->whenLoaded('ammenityValues')) : []
        ];
    }
}

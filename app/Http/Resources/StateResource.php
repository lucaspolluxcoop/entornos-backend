<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'name'          => $this->name,
            'description'   => $this->description,
            'code'          => $this->code,
            'cities'        => CityResource::collection($this->whenLoaded('cities'))
        ];
    }
}

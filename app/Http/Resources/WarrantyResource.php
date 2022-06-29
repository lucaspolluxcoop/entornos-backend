<?php

namespace App\Http\Resources;

use App\Http\Resources\WarrantyTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WarrantyResource extends JsonResource
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
            'user'          => UserResource::make($this->whenLoaded('user')),
            'warrantyType'  => WarrantyTypeResource::make($this->whenLoaded('warrantyType'))
        ];
    }
}

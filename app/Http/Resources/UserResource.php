<?php

namespace App\Http\Resources;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserStateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email'             => $this->email,
            'identifierCode'    => $this->identifier_code,
            'role'              => RoleResource::make($this->whenLoaded('role')),
            'profile'           => ProfileResource::make($this->whenLoaded('profile')),
            'userState'         => UserStateResource::make($this->whenLoaded('userState')),
            'createdAt'         => $this->created_at,
            'updatedAt'         => $this->lastAccess(),
            'warrantyType'      => $this->whenPivotLoaded('warranties', function () {
                return WarrantyTypeResource::make($this->pivot->warrantyType);
            }),
            'firstLogin'        => $this->isFirstLogin()
        ];
    }
}

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
            'college'           => UserResource::make($this->whenLoaded('college')),
            'college_id'        => $this->college_id,
            'userState'         => UserStateResource::make($this->whenLoaded('userState')),
            'createdAt'         => $this->created_at,
            'updatedAt'         => $this->lastAccess(),
            'collegeFilePath'   => $this->college_file_path,
            'warrantyType'      => $this->whenPivotLoaded('warranties', function () {
                return WarrantyTypeResource::make($this->pivot->warrantyType);
            }),
            'firstLogin'        => $this->isFirstLogin()
        ];
    }
}

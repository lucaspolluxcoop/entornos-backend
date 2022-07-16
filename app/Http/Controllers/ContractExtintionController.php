<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ContractResource;
use App\Http\Requests\ContractExtintionRequest;

class ContractExtintionController extends Controller
{
    public function update(Contract $contract, ContractExtintionRequest $request)
    {
        $this->allowsOrAbort('contract-extintions.update');

        $contractExtintionData = $request->validated();

        $contract->update($contractExtintionData);

        return new ContractResource($contract->load([
            'owner.profile.city.state',
            'tenant.profile.city.state',
            'tenant.profile.economicActivityType',
            'locator.profile.city.state',
            'property.city.state',
            'property.propertyType.ammenities',
            'property.ammenityValues',
            'property.propertyAntiquity.propertyConservation',
            'property.propertyAntiquity.propertyTermination',
            'property.propertyAntiquity.propertyMaintenanceState',
            'property.propertyZone',
            'property.propertyPublicServices',
            'contractType',
            'warranties.warrantyType',
            'warranties.user.profile',
            'contractLocativeCanon',
            'contractNotifications.contractNotificationCategory',
            'contractNotifications.reason',
            'contractNotifications.user.profile',
            'contractNotifications.contractNotificationResponse',
            'extintionReason',
        ]));
    }
}

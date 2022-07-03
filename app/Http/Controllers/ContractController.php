<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Queries\ContractQuery;
use App\Events\PropertyNotAvailable;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Http\Resources\ContractResourceCollection;

class ContractController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contracts.index');

        $contracts = (new ContractQuery)->paginate((int)request()->query('perPage', 10));

        return new ContractResourceCollection($contracts);
    }

    public function show(Contract $contract)
    {
        $this->allowsOrAbort('contracts.show');

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
            'notifications.notificationManagement.notificationType',
            'notifications.notificationReason.role',
            'notifications.user.profile',
            'notifications.notificationResponse',
            'extintionReason',
        ]));
    }

    public function store(ContractRequest $request)
    {
        $this->allowsOrAbort('contracts.store');

        $contractData = ($request->validated());

        $property = Property::findOrFail($contractData['property_id']);

        if(!$property->isAvailable($contractData)) {

            event(new PropertyNotAvailable($property, $contractData));

            return $this->getPropertyFailedResponse($property->property_identifier);
        }

        $contract = Contract::create($contractData);

        $contract->warranties()->sync($contractData['warranties']);

        $contract->generateId();

        $contracts = (new ContractQuery)->paginate((int)request()->query('perPage', 10));

        return new ContractResourceCollection($contracts);
    }

    public function update(Contract $contract, ContractRequest $request)
    {
        $this->allowsOrAbort('contracts.update');

        $contractData = ($request->validated());

        $property = Property::findOrFail($contractData['property_id']);

        if(!$property->isAvailable($contractData,$contract)) {

            event(new PropertyNotAvailable($property,$contractData));

            return $this->getPropertyFailedResponse($property->property_identifier);
        }

        $contract->update($contractData);

        $contract->warranties()->sync($contractData['warranties']);

        return new JsonResponse(null,204);
    }

    public function destroy(Contract $contract)
    {
        $this->allowsOrAbort('contracts.destroy');

        $contract->delete();

        return new JsonResponse(null,200);
    }

    private function getPropertyFailedResponse($id)
    {
        return response()->json([
            'errors' => [__('constants.contract.failed',["prop_id" => $id])]
        ],403);
    }
}

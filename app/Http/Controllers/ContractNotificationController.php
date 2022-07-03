<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Queries\ContractQuery;
use Illuminate\Http\JsonResponse;
use App\Models\ContractNotification;
use App\Queries\ContractNotificationQuery;
use App\Events\ContractNotificationCreated;
use App\Events\ContractNotificationsCreated;
use App\Http\Requests\ContractNotificationRequest;
use App\Http\Resources\ContractNotificationResource;
use App\Http\Resources\ContractNotificationResourceCollection;

class ContractNotificationController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contract-notifications.index');

        $contract = Contract::find(request()->query('contract'));

        $contractNotifications = (new ContractNotificationQuery($contract))->paginate((int)request()->query('perPage', 10));

        return new ContractNotificationResourceCollection($contractNotifications);
    }

    public function show(ContractNotification $contractNotification)
    {
        $this->allowsOrAbort('contract-notifications.show');

        return new ContractNotificationResource($contractNotification->load([
            'contract',
            'reason',
            'contractNotificationCategory',
            'user.profile',
            'contractNotificationResponse'
        ]));
    }

    public function store(ContractNotificationRequest $request)
    {
        $this->allowsOrAbort('contract-notifications.store');

        $contractNotification = $request->validated();

        $newContractNotification = ContractNotification::create($contractNotification);

        event(new ContractNotificationsCreated($newContractNotification));

        return new JsonResponse(null,201);
    }

    public function update(ContractNotification $contractNotification, ContractNotificationRequest $request)
    {
        $this->allowsOrAbort('contract-notifications.update');

        $contractNotification->update($request->validated());

        return new JsonResponse(null,200);
    }

    public function destroy(ContractNotification $contractNotification)
    {
        $this->allowsOrAbort('contract-notifications.destroy');

        $contractNotification->delete();

        return new JsonResponse(null,200);
    }
}

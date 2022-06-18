<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractNotificationResponse;
use App\Http\Resources\ContractNotificationResponseResourceCollection;

class ContractNotificationResponseController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contract-notification-responses.index');

        $responses = ContractNotificationResponse::all();

        return new ContractNotificationResponseResourceCollection($responses);
    }
}

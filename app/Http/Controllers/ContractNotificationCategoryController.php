<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractNotificationCategory;
use App\Http\Resources\ContractNotificationCategoryResourceCollection;

class ContractNotificationCategoryController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('contract-notification-categories.index');

        $notifications = ContractNotificationCategory::with('parent')->get();

        return new ContractNotificationCategoryResourceCollection($notifications);
    }
}

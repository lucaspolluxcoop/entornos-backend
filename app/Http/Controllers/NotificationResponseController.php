<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationResponse;
use App\Http\Resources\NotificationResponseResourceCollection;

class NotificationResponseController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('notification-responses.index');

        $responses = NotificationResponse::all();

        return new NotificationResponseResourceCollection($responses);
    }
}

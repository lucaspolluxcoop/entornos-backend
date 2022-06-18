<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function allowsOrAbort($action, $returnCondition = false)
    {
        if ($returnCondition) {
            return;
        }

        abort_unless($this->hasPermission($action), 403);
    }

    /**
     * @param string $action
     * @return bool
     */
    protected function hasPermission($action)
    {
        return Gate::allows('do_action', $action);
    }
}

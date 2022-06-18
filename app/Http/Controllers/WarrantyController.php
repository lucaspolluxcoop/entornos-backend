<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use Illuminate\Http\Request;
use App\Queries\WarrantyQuery;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\WarrantyRequest;
use App\Http\Resources\WarrantyResource;
use App\Http\Resources\WarrantyResourceCollection;

class WarrantyController extends Controller
{
    public function index()
    {
        $this->allowsOrAbort('warranties.index');

        $warranties = (new WarrantyQuery)->paginate((int)request()->query('perPage', 10));

        return new WarrantyResourceCollection($warranties);
    }

    public function show(Warranty $warranty)
    {
        $this->allowsOrAbort('warranties.show');

        return new WarrantyResource($warranty->load(['warrantyType','user.profile']));
    }

    public function store(WarrantyRequest $request)
    {
        $this->allowsOrAbort('warranties.store');

        $warranty = $request->validated();

        if($request->hasFile('document')) {
            $warranty['file_path'] = $request->file('document')->store('', 'warranties');
        }

        $warranty = Warranty::create($warranty);

        return new WarrantyResource($warranty->load(['warrantyType','user.profile']));
    }

    public function destroy(Warranty $warranty)
    {
        $this->allowsOrAbort('warranties.destroy');

        $warranty->delete();

        return new JsonResponse(null,200);
    }
}

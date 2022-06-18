<?php

namespace App\Models;

use App\Models\Property;
use App\Models\PropertyPublicService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyPropertyPublicService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function propertyPublicService()
    {
        return $this->belongsTo(PropertyPublicService::class);
    }
}

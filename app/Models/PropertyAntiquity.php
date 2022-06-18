<?php

namespace App\Models;

use App\Models\Property;
use App\Models\PropertyTermination;
use App\Models\PropertyConservation;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyMaintenanceState;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyAntiquity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function propertyConservation()
    {
        return $this->belongsTo(PropertyConservation::class);
    }

    public function propertyTermination()
    {
        return $this->belongsTo(PropertyTermination::class);
    }

    public function propertyMaintenanceState()
    {
        return $this->belongsTo(PropertyMaintenanceState::class);
    }
}

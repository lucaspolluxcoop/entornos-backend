<?php

namespace App\Models;

use App\Models\PropertyType;
use App\Models\PropertyZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyZonePropertyType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyZone()
    {
        return $this->belongsTo(PropertyZone::class);
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

}

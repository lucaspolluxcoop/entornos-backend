<?php

namespace App\Models;

use App\Models\PropertyZone;
use App\Models\PropertyAmmenity;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyZonePropertyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zones()
    {
        return $this->belongsToMany(PropertyZone::class, 'property_zone_property_types');
    }

    public function ammenities()
    {
        return $this->belongsToMany(PropertyAmmenity::class, 'property_type_ammenities');
    }
}

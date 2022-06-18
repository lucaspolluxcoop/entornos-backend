<?php

namespace App\Models;

use App\Models\PropertyType;
use App\Models\PropertyAmmenity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyTypeAmmenity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function propertyAmmenity()
    {
        return $this->belongsTo(PropertyAmmenity::class);
    }
}

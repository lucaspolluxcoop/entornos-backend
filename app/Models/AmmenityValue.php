<?php

namespace App\Models;

use App\Models\PropertyAmmenity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmmenityValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyAmmenity()
    {
        return $this->belongsTo(PropertyAmmenity::class);
    }
}

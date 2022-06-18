<?php

namespace App\Models;

use App\Models\AmmenityValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyAmmenity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ammenityValues()
    {
        return $this->hasMany(AmmenityValue::class);
    }
}

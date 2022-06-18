<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\PlateState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'plate_state_id',
        'expiration_date'
    ];

    public const ACTIVA = 1;
    public const INHABILITACION_TEMPORARIA = 3;
    public const INHABILITACION_PERMANENTE = 4;

    public function plateState()
    {
        return $this->belongsTo(PlateState::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}

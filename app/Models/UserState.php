<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const CREADO = 1;
    public const VERIFICADO = 2;
    public const INHABILITADO = 3;
}

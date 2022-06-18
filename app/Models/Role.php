<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const SUDO = 'sudo';
    public const ADMIN = 'administrator';
    public const COLEGIO = 'college_real_state_brokers';
    public const CORREDOR = 'real_state_broker';
    public const LOCADOR_PARTICULAR = 'private_locator';
    public const LOCATARIO = 'tenant';
    public const GARANTE = 'warrant';
    public const TERCEROS = 'third_parties';
    public const LOCADOR = 'locator';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}

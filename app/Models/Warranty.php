<?php

namespace App\Models;

use App\Models\User;
use App\Models\WarrantyType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warranty extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'warranty_type_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function warrantyType()
    {
        return $this->belongsTo(WarrantyType::class);
    }
}

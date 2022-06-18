<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contract;
use App\Models\WarrantyType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warranty extends Pivot
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'contract_id',
        'warranty_type_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function warrantyType()
    {
        return $this->belongsTo(WarrantyType::class);
    }
}

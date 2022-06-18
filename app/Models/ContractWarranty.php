<?php

namespace App\Models;

use App\Models\Warranty;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractWarranty extends Model
{
    use HasFactory;

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }
}

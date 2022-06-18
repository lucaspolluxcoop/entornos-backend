<?php

namespace App\Models;

use App\Models\City;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class)->orderBy('title');
    }
}

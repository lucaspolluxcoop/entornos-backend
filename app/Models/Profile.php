<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Plate;
use App\Models\FamilyGroupMember;
use App\Models\EconomicActivityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'denomination',
        'district',
        'cuit',
        'phone',
        'cell_phone',
        'economic_activity_type_id',
        'other_economic_activity_type_name',
        'website',
        'city_id',
        'zip',
        'street',
        'number',
        'floor',
        'apartment',
        'neighbourhood',
        'family_group_adults',
        'family_group_under_age',
        'dni',
        'business_name',
        'nationality'
    ];

    public function economicActivityType()
    {
        return $this->belongsTo(EconomicActivityType::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function familyGroupMembers()
    {
        return $this->hasMany(FamilyGroupMember::class);
    }
    public function plate()
    {
        return $this->hasOne(Plate::class);
    }
}

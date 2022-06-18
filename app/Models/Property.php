<?php

namespace App\Models;

use App\Models\City;
use App\Models\Contract;
use App\Models\PropertyType;
use App\Models\PropertyZone;
use App\Models\PropertyAntiquity;
use App\Models\AmmenityValueProperty;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyPropertyPublicService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function propertyZone()
    {
        return $this->belongsTo(PropertyZone::class);
    }
    public function ammenityValues()
    {
        return $this->belongsToMany(AmmenityValue::class, 'ammenity_value_properties');
    }
    public function ammenityValueProperties()
    {
        return $this->hasMany(AmmenityValueProperty::class);
    }

    public function propertyPublicServices()
    {
        return $this->belongsToMany(PropertyPublicService::class, 'property_property_public_services');
    }

    public function propertyPropertyPublicServices()
    {
        return $this->hasMany(PropertyPropertyPublicService::class);
    }

    public function propertyAntiquity()
    {
        return $this->hasOne(PropertyAntiquity::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function isAvailable($newContract, $currentContract = null, $returnContract = false)
    {
        $contract = Contract::where('property_id',$this->id)
                            ->when($currentContract, function($query) use($currentContract) {
                                $query->where('id', '!=', $currentContract->id);
                            })
                            ->whereDate('start_contract', '<=', $newContract['end_contract'])
                            ->whereDate('end_contract', '>=', $newContract['start_contract'])
                            ->first();

        if(is_null($contract)) {
            return true;
        }

        return $returnContract ? $contract : false;
    }

    private function validateContractDates($date1,$date2) {
        return  date('Y-m-d', strtotime($date1)) <= date('Y-m-d', strtotime($date2));
    }
}

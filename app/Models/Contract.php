<?php

namespace App\Models;

use App\Models\Property;
use App\Models\Warranty;
use App\Models\ContractType;
use App\Models\ExtintionReason;
use App\Models\ContractNotification;
use App\Models\ContractLocativeCanon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'start_contract',
        'end_contract',
        'property_id',
        'contract_type_id',
        'owner_id',
        'tenant_id',
        'locator_id',
        'contract_locative_canon_id',
        'contract_identifier',
        'extintion_date',
        'extintion_reason_id',
        'other_reason',
        'extended_contract',
        'renewed_contract',
        'finished_contract',
    ];

    protected $dates = ['deleted_at'];

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id')->withTrashed();
    }

    public function tenant()
    {
        return $this->belongsTo(User::class,'tenant_id')->withTrashed();
    }

    public function locator()
    {
        return $this->belongsTo(User::class,'locator_id')->withTrashed();
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function warranties()
    {
        return $this->belongsToMany(Warranty::class,'contract_warranties');
    }

    public function contractLocativeCanon()
    {
        return $this->belongsTo(ContractLocativeCanon::class);
    }

    public function contractNotifications()
    {
        return $this->hasMany(ContractNotification::class);
    }

    public function extintionReason()
    {
        return $this->belongsTo(ExtintionReason::class);
    }

    public function generateId()
    {
        $this->contract_identifier = $this->owner->identifier_code ."-". sprintf("%09d", $this->id);

        $this->save();
    }

    public function getUsers()
    {

        $users = collect();

        $users->add($this->tenant->load(['profile','role']));

        $users->add($this->locator->load(['profile','role']));

        foreach($this->warranties as $warranty) {

            $repeated = false;

            foreach( $users as $user) {
                if ($user->id == $warranty->user->id) {
                    $repeated = true;
                }
            }

            if (!$repeated) {
                $users->add($warranty->user->load(['profile','role']));
            }
        }
        return $users;
    }

    public function setContractFinalState($state)
    {
        $this->extended_contract = $state === 'extended';
        $this->renewed_contract = $state === 'renewed';
        $this->finished_contract = $state === 'finished';

        $this->save();
    }
}

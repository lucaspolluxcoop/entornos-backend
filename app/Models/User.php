<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Profile;
use App\Models\Contract;
use App\Models\UserState;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\MailResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword, SoftDeletes, EagerLoadPivotTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'role_id',
        'profile_id',
        'identifier_code',
        'user_state_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function userState()
    {
        return $this->belongsTo(UserState::class);
    }

    public function lastAccess()
    {
        return DB::table('oauth_access_tokens')->where('oauth_access_tokens.user_id',$this->id)->latest()->first()->created_at ?? null;
    }

    public function isFirstLogin()
    {
        return DB::table('oauth_access_tokens')->where('oauth_access_tokens.user_id',$this->id)->count() == 1;
    }

    public function setRealStateBrokerIdentifier()
    {
        $this->identifier_code = sprintf("%05d", $this->profile->plate->number);

        $this->save();
    }

    public static function searchBy($data,$role)
    {
        return User::with([
                'role',
                'profile.economicActivityType',
                'profile.city.state',
                'userState'
            ])->join('profiles','profiles.user_id','=','users.id')
            ->selectRaw('users.*')
            ->where('users.role_id',$role)
            ->where(function($query) use($data) {
                $query
                    ->where('profiles.cuit',$data)
                    ->orWhere('profiles.dni',$data);
            })
            ->first();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token, $this->profile));
    }

    public function getOwnUsers()
    {
        if($this->role->name == Role::CORREDOR) {
            $contracts = Contract::where('owner_id', Auth::id())->get();
            $ownUsers = [];
            foreach($contracts as $contract) {
                $ownUsers->add($contract->tenant_id);
                $ownUsers->add($contract->locator_id);
                foreach($contract->warranties() as $warranty) {
                    $ownUser->add($warranty->user->id);
                }
            }
            return array_unique($ownUsers);
        }
        return [];
    }

    public function getOwnProperties()
    {
        if($this->role->name == Role::CORREDOR) {
            $contracts = Contract::where('owner_id', Auth::id())->get()->toArray();
            $ownProperties = array_map( function($contract) {
                return $contract['property_id'];
            }, $contracts);
            return array_unique($ownProperties);
        }
        return [];
    }

    public function getOwnWarranties()
    {
        if($this->role->name == Role::CORREDOR) {
            $contracts = Contract::where('owner_id', Auth::id())->get()->toArray();
            $ownWarranties = array_map( function($contract) {
                return array_map( function($warranty) {
                    return $warranty['id'];
                }, $contract['warranties']->toArray());
            }, $contracts);

            return array_unique($ownWarranties);
        }
        return [];
    }
}

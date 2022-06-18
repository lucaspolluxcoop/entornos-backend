<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Profile;
use App\Models\UserState;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
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
        'college_id',
        'identifier_code',
        'college_file_path',
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
    public function college()
    {
        return $this->belongsTo(User::class,'college_id');
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

    public function setIdentifier()
    {
        if($this->role->name == Role::COLEGIO || $this->role->name == Role::LOCADOR) {
            $this->identifier_code = $this->profile->city->state->code . sprintf("%04d", $this->id);

            $this->save();
        }
    }

    public function setRealStateBrokerIdentifier()
    {
        $this->identifier_code = $this->college->identifier_code . sprintf("%05d", $this->profile->plate->number);

        $this->save();
    }

    public static function searchRealStateBroker($plateNumber, $stateId, $collegeId)
    {
        return User::with([
                'role',
                'profile.plate.plateState',
                'profile.city.state',
                'college',
                'userState'
            ])->join('profiles','profiles.user_id','=','users.id')
            ->join('plates', 'plates.profile_id', '=', 'profiles.id')
            ->join('cities', 'cities.id', '=', 'profiles.city_id')
            ->selectRaw('users.*')
            ->where('cities.state_id',$stateId)
            ->where('plates.number',$plateNumber)
            ->where('college_id', $collegeId)
            ->first();
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

    public static function searchGroupedUser($cuit)
    {
        $realStateBrokerId = Role::where('name', Role::CORREDOR)->first()->id;
        $collegeId = Role::where('name', Role::COLEGIO)->first()->id;
        $user = DB::table('users')
            ->join('profiles','profiles.user_id','=','users.id')
            ->join('roles','users.role_id','=','roles.id')
            ->join('cities','profiles.city_id','=','cities.id')
            ->join('states','cities.state_id','=','states.id')
            ->selectRaw('profiles.first_name, profiles.last_name, profiles.cuit, cities.title, states.name')
            ->where(function($query) use($cuit, $collegeId, $realStateBrokerId) {
                $query->where('profiles.cuit',$cuit);
                $query->where('users.role_id', '<>', $realStateBrokerId);
                $query->where('users.role_id', '<>', $collegeId);
            })
            ->groupByRaw('profiles.cuit, profiles.first_name, profiles.last_name, cities.title, states.name')
            ->first();

        if(!is_null($user)) {
            return [
                'firstName' => $user->first_name,
                'lastName'  => $user->last_name,
                'cuit'      => $user->cuit,
                'city'      => ucfirst(strtolower($user->title)),
                'state'      => $user->name,
            ];
        }
        return null;
    }

    public static function getUsersByCuit($cuit)
    {
        $realStateBrokerId = Role::where('name', Role::CORREDOR)->first()->id;
        $collegeId = Role::where('name', Role::COLEGIO)->first()->id;
        return User::with(['profile.city.state','role'])
            ->where('role_id', '<>', $realStateBrokerId)
            ->where('role_id', '<>', $collegeId)
            ->whereHas('profile', function($query) use($cuit) {
                $query->where('cuit', $cuit);
            })->get();
    }
}

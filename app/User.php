<?php

namespace App;

use App\Entities\Company;
use App\Entities\Image;
use App\Entities\MpesaPaybill;
use App\Entities\Sacco;
use App\Entities\SmsOutbox;
use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Support\UuidScopeTrait;
use Carbon\Carbon;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes, UuidScopeTrait;
    use LaratrustUserTrait; 
    
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'uuid', 'password', 'gender', 'phone', 'browser', 'browser_version', 'os', 'device', 'src_ip', 'user_agent', 'phone_country', 'state_id', 'city_id', 'constituency_id', 'ward_id', 'dob', 'dob_updated', 'confirm_code', 'active', 'status_id', 'deleted_at', 'created_by', 'updated_by', 'updated_at', 'created_at'
    ];

    /**
     * Fire events on the model, oncreated, onupdated
     */
    protected $events = [
        'created' => UserCreated::class,
        'updated' => UserUpdated::class,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['dob'];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token', 'refresh_token',
    ];

      /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        if (array_key_exists('password', $attributes)) {
            $attributes['password'] = bcrypt($attributes['password']);
        }

        //convert phone to standard local phone
        if (array_key_exists('phone', $attributes)) {
            $phone = getLocalisedPhoneNumber($attributes['phone'], $attributes['phone_country']);
            $attributes['phone'] = $phone;
        }

        //generate confirm code
        $attributes['confirm_code'] = strtoupper(generateCode(5));

        //add user env
        $agent = new \Jenssegers\Agent\Agent;

        $attributes['user_agent'] = serialize($agent);
        $attributes['browser'] = $agent->browser();
        $attributes['browser_version'] = $agent->version($agent->browser());
        $attributes['os'] = $agent->platform();
        $attributes['device'] = $agent->device();
        $attributes['src_ip'] = getIp();
        //end add user env

        $model = static::query()->create($attributes);

        return $model;

    }

    /*one to many relationship*/
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function confirmcodes()
    {
        return $this->hasMany(ConfirmCode::class);
    }

    public function chatchannels()
    {
        return $this->hasMany(ChatChannel::class);
    }

    public function chatthreadusers()
    {
        return $this->hasMany(ChatThreadUser::class);
    }


    public function setDobAttribute($date)
    {
         $this->attributes['dob'] = Carbon::parse($date);
    }

    /*relation between token and user*/
    public function token() {
        return $this->hasMany(Token::class);
    }

    /* polymorphic relationship \'*/
    public function images() {
        return $this->morphMany(Image::class, 'imagetable');
    }

    /*many to many relationship*/
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /*one to many relationship*/
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function smsOutboxes()
    {
        return $this->hasMany(SmsOutbox::class);
    }

    public static function getUser()
    {
        if (auth()->user()) {
            return auth()->user();
        } else {
            return null;
        }
    }

    //start convert dates to local dates
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone(getLocalTimezone());
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone(getLocalTimezone());
    }
    //end convert dates to local dates

    /*get user for passport login*/
    public function findForPassport($username) {

        return $this->where('active', '1')
                    ->where(function ($query) use ($username) {
                        $query->where('email', $username)
                              ->orWhere('phone', $username);
                    })->first();

    }

}

<?php

namespace App;

use App\Entities\Company;
use App\Entities\CompanyJoinRequest;
use App\Entities\CompanyUser;
use App\Entities\Group;
use App\Entities\Image;
use App\Entities\MpesaPaybill;
use App\Entities\Sacco;
use App\Entities\SmsOutbox;
use App\Entities\Status;
use App\Support\UuidScopeTrait;
use Carbon\Carbon;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Agent\Agent;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable, SoftDeletes, UuidScopeTrait;
    use LaratrustUserTrait;
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'first_name', 'uuid', 'user_cd', 'last_name', 'email', 'dob', 'password', 'gender', 'status_id', 'active', 'company_id', 'state_id', 'city_id', 'constituency_id', 'ward_id', 'remember_token', 'access_token', 'refresh_token', 'phone', 'phone_country', 'api_token', 'src_ip', 'user_agent', 'browser', 'browser_version', 'os', 'device', 'dob_updated', 'dob_updated_at', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    /*object events*/
    protected $events = [
        'created' => Events\UserCreated::class,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['dob', 'deleted_at', 'dob_updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'access_token', 'refresh_token',
    ];

    /*relation between token and user*/
    public function token() {
        return $this->hasMany(Token::class);
    }

    public function companyusers()
    {
        return $this->hasMany(CompanyUser::class);
    }

    public function companyjoinrequests()
    {
        return $this->hasMany(CompanyJoinRequest::class);
    }

    /* polymorphic relationship \'*/
    public function images() {
        return $this->morphMany(Image::class, 'imagetable');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimeStamps();
    }

    /*many to many relationship*/
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /*many to many relationship*/
    public function companies()
    {
        return $this->belongsToMany(Company::class)
            ->withPivot('created_by', 'updated_by')
            ->withTimestamps();
    }

    public function smsOutboxes()
    {
        return $this->hasMany(SmsOutbox::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public static function getUser()
    {
        $user_id = auth()->user();
        $userCompany = User::where('id', auth()->user()->id)->with('company')->first();
        return $userCompany;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function getUserCompanyAttribute()
    {
        $company = Company::findOrFail($this->company_id)->first();
        return $company;
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


    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        if (array_key_exists('password', $attributes)) {
            $attributes['password'] = bcrypt($attributes['password']);
        }

        //get next user cd
        $attributes['user_cd'] = generate_user_cd();

        //convert phone to standard db phone
        if (array_key_exists('phone', $attributes)) {
            $phone = getLocalisedPhoneNumber($attributes['phone'], $attributes['phone_country']);
            $attributes['phone'] = $phone;
        }

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


    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updatedata($id, array $attributes = [])
    {

        $user_id = auth()->user()->id;
        $attributes['updated_by'] = $user_id;

        //user data
        $user = static::query()->findOrFail($id);

        $model = $user->update($attributes);

        return $model;

    }


}

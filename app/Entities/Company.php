<?php

namespace App\Entities;

use App\Entities\Account;
use App\Entities\CompanyJoinRequest;
use App\Entities\CompanyUser;
use App\Entities\Group;
use App\Entities\Image;
use App\Entities\LoanAccount;
use App\Entities\LoanApplication;
use App\Entities\MpesaPaybill;
use App\Entities\Product;
use App\Entities\SmsOutbox;
use App\Entities\Status;
use App\Entities\UssdContactUs;
use App\Entities\UssdRecommend;
use App\Entities\UssdRegistration;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name', 'description', 'company_no', 'physical_address', 'ussd_code', 'box', 'paybill_type', 'sms_user_name', 'phone_number', 'email', 'latitude', 'longitude', 'deleted_at', 'deleted_by', 'created_by', 'updated_by'
    ];

    /*one to many relationship*/
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function companyusers()
    {
        return $this->hasMany(CompanyUser::class);
    }

    public function companyjoinrequests()
    {
        return $this->hasMany(CompanyJoinRequest::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function loanaccounts()
    {
        return $this->hasMany(LoanAccount::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function loanapplications()
    {
        return $this->hasMany(LoanApplication::class);
    }

    /*many to many relationship*/
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('created_by', 'updated_by')
            ->withTimestamps();
    }

    public function user_signed()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('created_by', 'updated_by')
            ->withTimestamps();
    }

    /* polymorphic relationship \'*/
    public function images() {
        return $this->morphMany(Image::class, 'imagetable');
    }

    /*one to many relationship*/
    public function mpesapaybills()
    {
        return $this->hasMany(MpesaPaybill::class);
    }

    public function smsoutboxes()
    {
        return $this->hasMany(SmsOutbox::class);
    }

    public function ussdpayments()
    {
        return $this->hasManyThrough('App\UssdPayment', 'App\UssdEvent');
    }

    public function ussdregistrations() {
        return $this->hasMany(UssdRegistration::class);
    }

    public function ussdrecommends() {
        return $this->hasMany(UssdRecommend::class);
    }

    public function ussdcontactus() {
        return $this->hasMany(UssdContactUs::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
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

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        if (auth()->user()) {
            $user_id = auth()->user()->id;

            $attributes['created_by'] = $user_id;
            $attributes['updated_by'] = $user_id;
        }

        if (array_key_exists('sms_user_name', $attributes)) {
            $sms_user_name = $attributes['sms_user_name'];
            //remove all special chars
            $attributes['sms_user_name'] = removeSpecialChars($sms_user_name);
        }

        $model = static::query()->create($attributes);

        return $model;

    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updatedata($id, array $attributes = [])
    {

        if (auth()->user()) {
            $user_id = auth()->user()->id;

            $attributes['updated_by'] = $user_id;
        }

        if (array_key_exists('sms_user_name', $attributes)) {
            $sms_user_name = $attributes['sms_user_name'];
            //remove all special chars
            $attributes['sms_user_name'] = removeSpecialChars($sms_user_name);
        }

        //item data
        $item = static::query()->findOrFail($id);

        $model = $item->update($attributes);

        return $model;

    }

}

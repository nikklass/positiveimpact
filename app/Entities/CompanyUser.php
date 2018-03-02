<?php

namespace App\Entities;

use App\Entities\Company;
use App\Entities\CompanyUserArchive;
use App\Entities\Status;
use App\Entities\Account;
use App\Entities\DepositAccount;
use App\Entities\LoanApplication;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'company_id', 'user_id', 'status_id', 'created_by', 'updated_by', 'deleted_by', 'comments', 'deleted_at'
    ];

    /*one to many relationship*/
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companyuserarchives()
    {
        return $this->hasMany(CompanyUserArchive::class, 'id', 'parent_id');
    }

    public function companyjoinrequest()
    {
        return $this->hasOne(CompanyJoinRequest::class);
    }

    public function loanapplications()
    {
        return $this->hasMany(LoanApplication::class);
    }

    public function depositaccounts()
    {
        return $this->hasMany(DepositAccount::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /*many to many relationship*/
    public function user()
    {
        return $this->belongsTo(User::class);
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

        //item data
        $item = static::query()->findOrFail($id);

        $model = $item->update($attributes);

        return $model;

    }

}

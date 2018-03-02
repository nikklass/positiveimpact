<?php

namespace App\Entities;

use App\Entities\Account;
use App\Entities\Company;
use App\Entities\ConfirmCode;
use App\Entities\Country;
use App\Entities\Currency;
use App\Entities\DepositAccount;
use App\Entities\Image;
use App\Entities\LoanApplication;
use App\Entities\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'id', 'name', 'section'
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    } 

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    } 

    public function smsoutboxes()
    {
        return $this->hasMany(SmsOutbox::class);
    } 

    public function loanapplications()
    {
        return $this->hasMany(LoanApplication::class);
    }

    public function currencies()
    {
        return $this->hasMany(Currency::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function depositaccounts()
    {
        return $this->hasMany(DepositAccount::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function schedulesmsoutboxes()
    {
        return $this->hasMany(ScheduleSmsOutbox::class);
    }

    public function confirmcodes()
    {
        return $this->hasMany(ConfirmCode::class);
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        $model = static::query()->create($attributes);

        return $model;

    }

}

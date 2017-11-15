<?php

namespace App\Entities;

use App\Entities\Company;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UssdRegistration extends Model
{

    /**
     * The attributes that are mass assignable
    **/
    protected $fillable = [
         'name', 'phone', 'alternate_phone', 'tsc_no', 'company_id', 'email', 'phone_county', 'county', 'sub_county', 'workplace', 'ict_level', 'subjects', 'lipanampesacode', 'registered', 'time_stamp', 'user_agent', 'browser', 'browser_version', 'os', 'device', 'src_ip'
    ];

    /*relationships*/
    public function company() {
        return $this->belongsTo(Company::class);
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        if (array_key_exists('phone', $attributes)) {
            $attributes['phone'] = getDatabasePhoneNumber($attributes['phone']);
        }

        if (array_key_exists('alternate_phone', $attributes)) {
            $attributes['alternate_phone'] = getLocalisedPhoneNumber($attributes['alternate_phone']);
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

}

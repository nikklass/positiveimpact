<?php

namespace App\Entities;

use App\Entities\Category;
use App\Entities\Club;
use App\Entities\Image;
use App\Entities\Status;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Offer.
 */
class Offer extends Model
{

    protected $appends = ['offer_url'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'description', 'club_id', 'expiry_date', 'start_date', 'end_date', 'offer_day', 'offer_frequency', 'offer_type', 'num_products', 'offer_expiry_method', 'num_sales', 'max_sales', 'status_id', 'permalink', 'expiry_email', 'min_age', 'max_age', 'created_by', 'updated_by'
    ];


    /*relationships*/
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
        //class, foreign key, local key on foreign table
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagetable');
    }

    public function getOfferUrlAttribute() {
        return $this->attributes['offer_url'] = 'http://myurl';
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = [])
    {

        //start error checks
        if (array_key_exists('offer_frequency', $attributes)) {
            $offer_frequency = $attributes['offer_frequency'];
            $offer_day = $attributes['offer_day'];
            if ($offer_frequency == "recurring-weekly" &&  !$offer_day) {
                throw new StoreResourceFailedException("Please select offer day");
            }
        }

        if (array_key_exists('offer_frequency', $attributes)) {
            $offer_frequency = $attributes['offer_frequency'];
            $offer_day = $attributes['offer_day'];
            if ($offer_frequency == "recurring-weekly" &&  !$offer_day) {
                throw new StoreResourceFailedException("Please select offer day");
            }
        }

        if (($expiry_item_type=="by_sales_radio") && (!$offer_sales)) {
            
            $response["message"] = "Please enter maximum drink sales number";
            $response["error"] = true;
            $response["ref"] = "none";
            
        }
        //end error checks

        
        if (array_key_exists('phone', $attributes)) {
            $phone = getLocalisedPhoneNumber($attributes['phone'], $attributes['phone_country']);
            $attributes['phone'] = $phone;
        }

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


}

<?php

namespace App\Entities;

use App\Entities\Offer;
use App\Entities\State;
use App\Entities\User;
use App\Entities\Status;
use App\Entities\Image;
use App\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Club.
 */
class Club extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'short_desc', 'description', 'paybill_no', 'contact_person', 'phone1', 'phone2', 'street_address', 'status_id', 'category_id', 'town', 'longitude', 'latitude', 'personal_email', 'email', 'state_id', 'permalink', 'facebook_url', 'instagram_url', 'googleplus_url', 'created_by', 'updated_by'
    ];

    /*relationships*/
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
        //class, foreign key, local key
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagetable');
    }

}

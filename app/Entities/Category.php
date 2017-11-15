<?php

namespace App\Entities;

use App\Entities\Offer;
use App\Entities\Club;
use App\Entities\User;
use App\Entities\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Category.
 */
class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'state_id', 'created_by', 'updated_by'
    ];

    /*relationships*/
    public function creator()
    {
        return $this->belongsTo(User::class, 'id', 'created_by');
        //class, foreign key, local key
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'id', 'updated_by');
    }

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get all of the offers in this category
     */
    public function offers()
    {
        return $this->hasManyThrough(Offer::class, Club::class);
    }

}

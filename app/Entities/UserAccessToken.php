<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserAccessToken extends Model
{

    /**
     * The attributes that are mass assignable 
     */
    protected $fillable = [
        'id', 'app_name', 'access_token', 'refresh_token', 'expires_in', 'expires_time'
    ];

    //public $timestamps = false; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_token', 'refresh_token'
    ];


}

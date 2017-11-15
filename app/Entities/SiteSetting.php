<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name', 'text', 'description', 'admin',  'lang_id', 'status_id', 'created_by', 'updated_by'
    ];

    public static function getSiteSettings()
    {
        return getAllSiteSettings();
    }

}

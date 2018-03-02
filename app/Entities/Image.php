<?php

namespace App\Entities;

use App\Entities\Status;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

Relation::morphMap([
	'user' => 'App\User',
	'post' => 'App\Entities\Post',
    'company' => 'App\Entities\Company'
]);

class Image extends Model
{
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'caption', 'thumb_img', 'thumb_img_400', 'full_img', 'status_id', 'image_section', 'imagetable_id', 'imagetable_type', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
    ];

    /*polymorphic relationship*/
    public function imagetable() {
        return $this->morphTo();
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

    public function getAllAttributes()
    {
        
        $columns = $this->getFillable();

        $attributes = $this->getAttributes();

        foreach ($columns as $column)
        {
            if (!array_key_exists($column, $attributes))
            {
                $attributes[$column] = null;
            }

            if (!array_key_exists('thumb_img_400', $attributes))
            {
                //dd('no thumb_img_400 exists');
            }
        }
        return $attributes;
    }

}

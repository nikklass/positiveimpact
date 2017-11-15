<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'user' => 'App\Entities\User',
	'club' => 'App\Entities\Club',
	'offer' => 'App\Entities\Offer',
	'product' => 'App\Entities\Product'
]);

class Image extends Model
{
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'caption', 'thumb_img', 'thumb_img_400', 'full_img', 'status', 'image_section', 'imagetable_id', 'imagetable_type', 'created_by', 'updated_by'
    ];

    /*polymorphic relationship*/
    public function imagetable() {
        return $this->morphTo();
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
                dd('no thumb_img_400 exists');
            }
        }
        return $attributes;
    }

}

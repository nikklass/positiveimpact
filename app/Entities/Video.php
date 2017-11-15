<?php

namespace App\Entities;

use App\Entities\Post;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    
    public function post() {
        return $this->belongsTo(Post::class);
    }
    
}

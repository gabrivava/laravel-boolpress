<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // associo il modello Post.
    public function post()
    {
        return $this->hasMany('App\Post');
    }
}

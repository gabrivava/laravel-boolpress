<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // associo il modello Post.
    /**
     * Get all of the posts for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

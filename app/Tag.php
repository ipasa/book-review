<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * Get the books associate wiht the tags
 * @package App
 */

class Tag extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

}

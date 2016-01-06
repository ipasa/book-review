<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model{

    protected $fillable =   [
        'location', 'bio', 'twitter_username', 'github_username'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

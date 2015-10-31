<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model{

    public function category(){
        //return Category::where('id', $this->category_id)->first()->name;
        return $this->belongsTo('App\Category');
    }
}

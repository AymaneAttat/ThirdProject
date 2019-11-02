<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function news(){
        return $this->hasMany('App\News');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}

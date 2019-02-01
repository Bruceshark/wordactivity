<?php

namespace App;

use App\Model;

class Post extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('like_count', 'desc'); //一对多
    }
}

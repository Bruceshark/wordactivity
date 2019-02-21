<?php

namespace App;

use App\Model;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // 用户的文章列表
    public function posts()
    {
        return $this->hasMany(\App\Post::class, 'user_id', 'id');
    }

    // 用户的评论列表
    public function comments()
    {
        return $this->hasMany(\App\Comment::class, 'user_id', 'id');
    }


}

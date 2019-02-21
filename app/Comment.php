<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // 评论所属文章
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    // 评论所属用户
    public function user()
    {
        return $this->belongsTo('App\User'); //反向一对多
    }

    // 和用户进行关联
    public function like($user_id)
    {
        return $this->hasOne(\App\Like::class)->where('user_id', $user_id);
    }

    // 评论的所有赞
    public function likes()
    {
        return $this->hasMany(\App\Like::class);
    }
}

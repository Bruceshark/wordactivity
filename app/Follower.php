<?php

namespace App;

use App\Model;

class Follower extends Model
{
    // 粉丝用户
    public function followeruser()
    {
        return $this->hasOne(\App\User::class, 'id', 'follower_id');
    }

    // 被关注用户
    public function followinguser()
    {
        return $this->hasOne(\App\User::class, 'id', 'following_id');
    }
}

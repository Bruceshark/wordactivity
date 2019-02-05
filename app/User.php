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

    // 关注我的Follower模型
    public function followers()
    {
        return $this->hasMany(\App\Follower::class, 'following_id', 'id');
    }

    // 我关注的Fan模型
    public function followings()
    {
        return $this->hasMany(\App\Follower::class, 'follower_id', 'id');
    }

    // 关注某人
    public function follow($uid)
    {
        $fan = new \App\Follower();
        $fan->following_id = $uid;
        return $this->followings()->save($fan);
    }

    // 取消关注
    public function unFollow($uid)
    {
        $fan = new \App\Follower();
        $fan->following_id = $uid;
        return $this->followings()->delete($fan);
    }

    // 当前用户是否被uid关注了
    public function isFollowed($uid)
    {
        return $this->followers()->where('follower_id', $uid)->count();
    }

    // 当前用户是否关注了uid
    public function isFollowing($uid)
    {
        return $this->followings()->where('following_id', $uid)->count();
    }
}

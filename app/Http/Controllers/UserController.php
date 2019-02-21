<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //个人中心页面
    public function show(User $user)
    {
        // 这个人信息，包含关注／粉丝／文章数
        $user = User::withCount(['comments', 'posts'])->find($user->id);

        // 这个人的文章列表，取创建时间最新的前10条
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
        $comments = $user->comments()->orderBy('created_at', 'desc')->take(10)->get();

        return view('user/show', compact('user', 'posts', 'comments'));
    }
}

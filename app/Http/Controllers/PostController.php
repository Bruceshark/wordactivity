<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    public function welcome(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view("welcome", compact('posts'));
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view("post/index", compact('posts'));
    }

    public function show(Post $post)
    {
//        $post->load('comments');
        return view("post/show", compact('post'));
    }
    //
}

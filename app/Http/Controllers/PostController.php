<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Comment;
use \App\Like;

class PostController extends Controller
{
    //首页的文章选
    public function welcome(){
        $posts = Post::orderBy('comment_count', 'desc')->paginate(3);
        return view("welcome", compact('posts'));
    }
    //文章概览
    public function index(){
        $posts = Post::orderBy('comment_count', 'desc')->withCount("comments")->paginate(6);
        return view("post/index", compact('posts'));
    }
    //详情页
    public function show(Post $post)
    {
//        $post->load('comments');
        $comments = $post->comments()->withCount("likes")->paginate(6);
        return view("post/show", compact('post', 'comments'));
    }
    //写新文章
    public function create()
    {
        return view("post/create");
    }

    //写新文章的储存逻辑
    public function store()
    {
        // 验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:3',
            'content' => 'required|string|min:5',
        ]);

        // 逻辑
        $user_id = \Auth::id();
        $params = array_merge(request(['title', 'content']), compact('user_id'));
        $post = Post::create($params);

        // 渲染
        return redirect("/posts");
    }

    // 上传图片
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'. $path);
    }

    // 编辑页面
    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

    // 编辑逻辑
    public function update(Post $post)
    {
        // 验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:3',
            'content' => 'required|string|min:5',
        ]);

        $this->authorize('update', $post);

        // 逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        // 渲染
        return redirect("/posts/{$post->id}");
    }

    // 删除逻辑
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect("/posts");
    }

    // 提交评论
    public function comment(Post $post)
    {
        $this->validate(request(),[
            'content' => 'required|min:3',
        ]);

        // 逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        $post->comment_count++;
        $post->save();

        // 渲染
        return back();
    }

    //点赞
    public function like(Comment $comment)
    {
        $param = [
            'user_id' => \Auth::id(),
            'comment_id' => $comment->id,
        ];

        Like::firstOrCreate($param);
        $comment->like_count ++;
        $comment->save();
        return back();
    }

    // 取消赞
    public function unlike(Comment $comment)
    {
        $comment->like(\Auth::id())->delete();
        $comment->like_count --;
        $comment->save();
        return back();
    }

}

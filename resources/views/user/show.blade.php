@extends("layout.main")

@section("content")
    <div class="col-sm-8">
        <blockquote>
                {{--<p><img src="{{$user->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}--}}
            {{$user->name}}
            <footer>文章：{{$user->posts_count}} | 评论：{{$user->comments_count}}</footer>
            {{--@include('user.badges.like', ['target_user' => $user])--}}
        </blockquote>
    </div>
    <div class="col-sm-8 blog-main">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">评论</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$post->user->id}}">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>
                            <p>{!! str_limit($post->content, 100, '...') !!}</p>
                        </div>
                    @endforeach
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_1">
                    @foreach($comments as $comment)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$comment->user->id}}">{{$comment->user->name}}</a> {{$comment->created_at->diffForHumans()}}</p>
                            <p>{!! str_limit($comment->content, 100, '...') !!}</p>
                        </div>
                    @endforeach
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>


    </div><!-- /.blog-main -->
@endsection
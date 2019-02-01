@extends("layout.main")
@section("content")
    <div class="container">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                </div>

                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} 由 <a href="#">{{$post->user->name}}</a> 创建
                @can('update', $post)
                    <a style="margin: auto"  href="/posts/{{$post->id}}/edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                @endcan
                @can('delete', $post)
                    <a style="margin: auto"  href="/posts/{{$post->id}}/delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                @endcan
                </p>

                <p>{!! $post->content !!}</p>
                {{--<div>--}}
                    {{--@if ($post->zan(\Auth::id())->exists())--}}
                        {{--<a href="/posts/{{$post->id}}/unzan" type="button" class="btn btn-default btn-lg">取消赞</a>--}}
                    {{--@else--}}
                        {{--<a href="/posts/{{$post->id}}/zan" type="button" class="btn btn-primary btn-lg">赞</a>--}}
                    {{--@endif--}}
                {{--</div>--}}
            </div>

            <hr>
            <div>
            <h3><b>点评</b></h3>
                <!-- List group -->
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <h5>在 {{$comment->created_at}} <b>{{$comment->user->name}}</b> 说：</h5>
                            <div>
                                <p>{!! $comment->content !!}</p>
                                <hr>
                                <div><p>
                                    @if ($comment->like(\Auth::id())->exists())
                                        <a href="/posts/{{$comment->id}}/unlike">
                                            👎取消赞
                                        </a>
                                    @else
                                        <a href="/posts/{{$comment->id}}/like">
                                            👍给个赞
                                        </a>
                                    @endif
                                    @if ($comment->likes_count == 0)
                                        | <span style="color:gray">还没有人赞过这条点评</span></p>
                                    @else
                                        | <span style="color:gray">{{$comment->likes_count}}人👍了这条点评</span></p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">发表评论</div>

                <!-- List group -->
                <ul class="list-group">
                    <form action="/posts/{{$post->id}}/comment" method="POST">
                        {{csrf_field()}}
                        <li class="list-group-item">
                            <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                            @include("layout.error")
                            <button class="btn btn-default" type="submit">提交</button>
                        </li>
                    </form>

                </ul>
            </div>

        </div><!-- /.blog-main -->
    </div>
@endsection

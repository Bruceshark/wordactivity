@extends("layout.main")
@section("content")
    <div class="container">
        <div class="col-sm-8 blog-main">
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p class="blog-post-meta"> {{$post->created_at->toFormattedDateString()}} 由 <a href="#">{{$post->user->name}}</a> 创建</p>
                <p>{!!str_limit(strip_tags($post->content),10,'...')!!}</p>
                <p class="blog-post-meta">点评 {{$post->comments_count}} 条</p>
            </div>
        @endforeach

        <div style="text-align:center">{{$posts->links()}}</div>
    </div><!-- /.blog-main -->
    </div>
@endsection

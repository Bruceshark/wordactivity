@extends("layout.main")

@section("content")
    <header class="jumbotron">
        <div class="container">
            <div class="col-xs-12 col-sm-6" style="text-align:left">
                <h1><b><font color="darkorange">WordActivity</font></b></h1>
                <h2><b><font color="darkorange"><em>我的活动</em></font></b></h2>
            </div>
        </div>
    </header>
    <div class="container">
    <div class="container" id="hotActsBlock">
        <div class="col-xs-12 col-sm-4 col-md-4" style="text-align:center;" >
            <h3><b>大家都在关注这些课外活动🔥</b></h3>
            <div class="hidden-xs" style="text-align:center; margin-top: 30px">
                <a href="/posts"><button type="button" class="btn btn-primary">探索更多</button></a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 blog-post-title" style="text-align:center;">
            @foreach($posts as $post)
            <h3><a href="/posts/{{$post->id}}">{!! str_limit($post->title, 15, '...') !!}</a></h3>
            @endforeach
            <br>
        </div>


        <div  class="visible-xs" style="text-align:center;  vertical-align: middle;">
            <a href="/posts"><button type="button" class="btn btn-primary" href="/posts">探索更多</button></a>
        </div>
    </div>

    <div class="container" id="about">
        <div>
            <h3><b>关于所有</b></h3>
            <hr>
        </div>

        <div class="row">
            <div class="col-xs-12  col-sm-3 col-md-3">
                <h2 align=center><b>About this site</b></h2>
                <h2 align=center><b>关于本站</b></h2>
            </div>
            <div class="col-xs-12  col-sm-9 col-md-9">
                <p>的花费了多少返回拉萨的发货了 的实力空么南方的康拉德JFK的撒酒疯拉德克撒解放开绿灯撒法名为呢</p>
                <p>大沙发附件和斯大林幅度萨芬还是德拉范老师点击返回，上的那lads尽快发你将来的萨芬你们，士大夫你九零士大夫你九零士大夫你就，的萨芬不都是比较安分骄傲而我和人家是大部分，但是不能的撒，方面难道是的首发式地方进口货物客人为人民，按时的奶粉 士大夫你，士大夫八点三，发表，时的那份不是电脑，安保费你说的，阿波菲斯电脑，安抚不能说的，啊把饭送到，部分史丹福波斯的那份吧</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h2 align=center><b>Developer info</b></h2>
                <h2 align=center><b>关于开发者</b></h2>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-9">
                <p>的花费了多少返回拉萨的发货了 的实力空么南方的康拉德JFK的撒酒疯拉德克撒解放开绿灯撒法名为呢</p>
                <p>大沙发附件和斯大林幅度萨芬还是德拉范老师点击返回，上的那lads尽快发你将来的萨芬你们，士大夫你九零士大夫你九零士大夫你就，的萨芬不都是比较安分骄傲而我和人家是大部分，但是不能的撒，方面难道是的首发式地方进口货物客人为人民，按时的奶粉 士大夫你，士大夫八点三，发表，时的那份不是电脑，安保费你说的，阿波菲斯电脑，安抚不能说的，啊把饭送到，部分史丹福波斯的那份吧，但是不能的撒，方面难道是的首发式地方进口货物客人为人民，按时的奶粉 士大夫你，士大夫八点三，发表，时的那份不是电脑，安保费你说的，阿波菲斯电脑，安抚不能说的，啊把饭送到，部分史丹福波斯的那份</p>
            </div>
        </div>
    </div>
    </div>
@endsection

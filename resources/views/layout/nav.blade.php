<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <!-- 响应式导航条 -->
        <div class="navbar-header">
            <!-- a hamburger button that will collapse in phone's screen 汉堡按钮 -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><b>WA</b></a>
        </div>
        <!-- 导航条上的各个选项 -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#about"><i class="glyphicon glyphicon-info-sign"></i><b> About</b></a></li>
                <li><a href="#projects"><i class="glyphicon glyphicon-folder-open"></i><b> Projects</b></a></li>
                <li><a href="#activities"><i class="glyphicon glyphicon-calendar"></i><b> Activities</b></a></li>
                <li><a href="#join"><i class="glyphicon glyphicon-plus"></i><b> Join</b></a></li>
                <li><a href="#partner"><i class="glyphicon glyphicon-user"></i><b> Partners</b></a></li>
                <li><a href="Rules.html"><i class="glyphicon glyphicon-th-list"></i><b> Rules</b></a></li>
                <li><a href="https://docs.qq.com/sheet/DUkhXakJ0VlRVSHZw?opendocxfrom=admin&tab=BB08J2"><i class="glyphicon glyphicon-usd"></i><b> Finance</b></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(\Auth::check())
                    <li><a href="/user/{{\Auth::id()}}">{{ \Auth::user()->name }}的主页</a></li>
                    <li><a href="/logout">登出</a></li>
                @else
                    <li><a href="/login">登陆</a></li>
                    <li><a href="/register">注册</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
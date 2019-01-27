<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordactivity</title>
    <link rel="shortcut icon" href="pics/DC_Logo.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">
    <style type="text/css">
        html, body {width:100%;height:100%;}
        .navbar{background:rgba(255,255,255,0.3)!important;}
        .navbar a{color:dimgray}
        .navbar a:hover {color:darkorange!important}
        .navbar a {transition: color 0.2s ease-in-out;}
        body { padding-top: 50px}
        a:link {
            text-decoration: none;
            color:dimgray;
        }
        a:visited {
            text-decoration: none;
            color:black;
        }
        a:hover {
            text-decoration: none;
            color:darkorange;
        }
        a:active {
            text-decoration: none;
            color: black;
        }

        .blog-post-title a:hover {
            text-decoration: underline!important;
            color:darkorange;
        }
        .blog-post-title a:link {
            text-decoration: none;
            color:darkorange;
        }
        .blog-post-title a:visited {
            text-decoration: none;
            color:darkorange;
        }
        .btn-primary {
            background-color:darkorange;
            border-color:darkorange;
            transition: color 0.2s ease-in-out;
            width:100px;
            height:50px;
            font-size:18px;
        }
        .btn-primary:hover {
            background-color:gold!important;
            border-color:gold;
        }
    </style>
</head>

<body>
@include("layout.nav")

    <div class="blog-header">
    </div>

    <div class="row">
        @yield("content")

    </div><!-- /.row -->
<!-- /.container -->

@include("layout.footer")

<!-- Include all frames, plugins, and functions in javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/wangEditor.min.js"></script>
<script src="/js/ylaravel.js"></script>
<script> //Reference: https://www.cnblogs.com/Wudj/p/9108649.html
    $(window).scroll(function () {
        //小屏幕下的导航条折叠
        if ($(window).width() < 768) {
            //点击导航链接之后，把导航选项折叠起来
            $("#navbar a").click(function () {
                $("#navbar").collapse('hide');
            });
            //滚动屏幕时，把导航选项折叠起来
            $(window).scroll(function () {
                $("#navbar").collapse('hide');
            });
        }
    });
</script>
</body>
</html>


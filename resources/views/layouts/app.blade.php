<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lovemap 愛心地圖</title>
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('resources/assets/css/blade.css')}}">
</head>
<body id="app-layout">
<nav class="navbar navbar-default toprow navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger (折疊後) -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand top-link-a" href="{{ url('/') }}">
                LoveMap
            </a>
            <!-- Branding Image -->
        </div>
        <div class="collapse navbar-collapse top-link-a" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a class="top-link" href="{{ url('/map') }}">地圖</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="top-link" href="{{ url('/login') }}">登入</a></li>
                    {{--<li><a class="top-link" href="{{ url('/register') }}">Register</a></li>--}}
                @elseif (Auth::user()->level > 0)
                    <li><a class="top-link" href="{{ url('/admin/member/list') }}">會員管理</a></li>
                    <li><a class="top-link" href="{{ url('/admin/article') }}">管理文章</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                                            class="fa fa-btn fa-sign-out"></i>登出</a></li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                @else
                    <li><a class="top-link" href="{{ url('selfarticle') }}">個人文章</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                                            class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
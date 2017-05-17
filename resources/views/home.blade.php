@extends('layouts.app')

@section('content')
    <div class="comeback pull-right" id="_top">
        <a href="">top</a>
    </div>
    <div class="top_image">
        <img src="resources/assets/img/hand2.png" class="img-responsive">
    </div>
    <div class="title-text">
        <h1>Love Map</h1>
        <h1 style="padding: 5px; font-size: 32px;">愛心訊息</h1>
    </div>
    <hr>
    <div class="container">
        <div class="add-btn">
            @if (Auth::check())
                <a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>
            @endif
        </div>
        <div id="content" class="row" style="margin-top: 20px">
            @foreach ($articles as $article)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title">
                            <a href="{{ url('article/'.$article->id) }}">
                                <div class="panel-heading">標題：{{ $article->title }}</div>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" value="{{$article->user_id}}">
                        <div class="body">
                            <p>類別：@if($article->event==0)金援 @elseif($article->event==1)人力 @else物資 @endif</p>
                            <p>需求量：@if($article->demand==0)小 @elseif($article->demand==1)中 @else大 @endif</p>
                            <p>地址：{{ $article->address }}</p>
                            <p>內容：{{ $article->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
    <script type='text/javascript'>
        $(function () {
            $(window).load(function () {
                $(window).bind('scroll resize', function () {
                    var $this = $(this);
                    var $this_Top = $this.scrollTop();

                    //當高度小於100時，關閉區塊
                    if ($this_Top < 100) {
                        $(".top").removeClass("test");
                    }
                    if ($this_Top > 100) {
                        $(".top").addClass("test");
                    }
                }).scroll();
            });
        });
    </script>
    <script type="text/javascript">
        //點擊top跑回頂端
        $(document).ready(function () {
            $('#_top').click(function () {
                $('html,body').animate({scrollTop: 0}, 'slow');
            });
        });
    </script>
    <script type="text/javascript">
        //隱藏top
        $(document).ready(function () {
            $("#_top").hide()
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 1) {//當window的scrolltop距離>1，top淡出，反之淡入
                        $("#_top").fadeIn();
                    } else {
                        $("#_top").fadeOut();
                    }
                });
            });


        });
    </script>
@endsection
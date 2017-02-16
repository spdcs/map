@extends('layouts.app')

@section('content')
    <div class="top_image">
        <img src="resources/assets/img/hand2.png" class="img-responsive">
    </div>
    <div class="title-text">
        <h1>Love Map</h1>
        <div style="padding: 5px; font-size: 32px;">愛心訊息</div>
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
                            <p>地址：{{ $article->address }}</p>
                            <p>內容：{{ $article->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
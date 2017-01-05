@extends('layouts.app')

@section('content')
    <div class="top_image">
        <center><img src="resources/assets/img/hand2.png"></center>
    </div>
    <div class="title-text">
        <h1>Love Map</h1>
        <div style="padding: 5px; font-size: 32px;">Post List</div>
    </div>
    <hr>
    <div class="add-btn">
        @if (Auth::check())
            <a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>
        @endif
    </div>
    <div id="content">
        <ul>
            <form>
                @foreach ($articles as $article)
                    <li style="margin: 50px 0;">
                        <div class="title">
                            <a href="{{ url('article/'.$article->id) }}">
                                <h4>主旨：{{ $article->title }}</h4>
                            </a>
                        </div>
                        <input type="hidden" value="{{$article->user_id}}">
                        <div class="body">
                            <p>事件：@if($article->event==0)金援
                                @elseif($article->event==1)人力
                                @else物資
                                @endif</p>
                            <p>內容：{{ $article->body }}</p>
                            <p>地址：{{ $article->address }}</p>
                        </div>
                        {{--<div class="edit-btn">--}}
                            {{--@if($article->user_id == 1)--}}
                                {{--<a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">編輯</a>--}}
                                {{--<form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">--}}
                                    {{--{{ method_field('DELETE') }}--}}
                                    {{--{{ csrf_field() }}--}}
                                {{--<button type="submit" class="btn btn-danger">刪除</button>--}}
                                {{--</form>--}}
                                {{--@else--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    </li>
                    <hr>
                @endforeach
            </form>
        </ul>
    </div>
@endsection
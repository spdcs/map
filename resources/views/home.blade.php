@extends('layouts.app')

@section('content')
    <div class="top_image">
        <center><img src="resources/assets/img/hand2.png"></center>
    </div>
    <div id="title" style="text-align: center;">
        <h1>Learn Laravel 5</h1>
        <div style="padding: 5px; font-size: 16px;">Learn Laravel 5</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            <form>
            @foreach ($articles as $article)
                <li style="margin: 50px 0;">
                    <div class="title">
                        <a href="{{ url('article/'.$article->id) }}">
                            <h4>主旨:{{ $article->title }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>內容:{{ $article->body }}</p>
                    </div>
                    <div class="body">
                        <p>地址:{{ $article->address }}</p>
                    </div>
                </li>
                <hr>
            @endforeach
            </form>
        </ul>
    </div>
@endsection
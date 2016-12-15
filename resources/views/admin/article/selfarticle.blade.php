@extends('layouts.app')

@section('content')
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
                            <p>內容：{{ $article->body }}</p>
                        </div>
                        <div class="body">
                            <p>地址：{{ $article->address }}</p>
                        </div>
                    </li>
                    <hr>
                @endforeach
            </form>
        </ul>
    </div>
@endsection
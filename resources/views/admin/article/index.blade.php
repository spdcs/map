@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('resources/assets/sass/blade.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">文章管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        {{--<a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>--}}

                        @foreach ($articles as $article)
                            <div class="article">
                                <h4>標題:{{ $article->title }}</h4>
                                <div class="content">
                                    <p>
                                        地址:{{ $article->address }}<br>
                                        事件:@if($article->event==0)金錢
                                        @elseif($article->event==1)人力
                                            @else物資
                                        @endif<br>
                                        內容:{{ $article->body }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">編輯</a>
                            <form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">刪除</button>
                            </form>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
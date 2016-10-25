@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">編輯留言</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>編輯失敗</strong> 輸入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        {{--<div class="breadcrumb">標題：{{ $article->title }}</div>--}}

                        <form method="POST" action="{{ url('admin/article/'.$article->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="text" name="title" class="form-control" required="required"
                                   placeholder="請輸入標題" value="{{ $article->title }}">
                            <br>
                            {{--<div class="form-group">--}}
                            <textarea name="body" rows="10" class="form-control" required="required"
                                      placeholder="請輸入內容" >{{ $article->body }}</textarea>
                            {{--</div>--}}<br>

                            {{--<div class="form-group">--}}
                            <button type="submit" class="btn btn-lg btn-info">提交留言</button>
                            {{--</div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
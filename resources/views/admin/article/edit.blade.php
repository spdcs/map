@extends('layouts.app')

@section('content')
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">編輯文章</div>
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
                            <label>標題：</label>
                            <input type="text" name="title" class="form-control" required="required"
                                   placeholder="請輸入標題" value="{{ $article->title }}">
                            <br>
                            <label>地址：</label>
                            <input type="text" name="address" class="form-control" required="required"
                                   placeholder="請輸入地址" value="{{ $article->address }}">
                            {{--</div>--}}<br>
                            {{--<div class="form-group">--}}
                            <label>類別：</label>
                            <input type="radio" name="event" class="form-check-input" value="0" @if($article->event==0)checked="checked"@else @endif>金錢
                            <input type="radio" name="event" class="form-check-input" value="1" @if($article->event==1)checked="checked"@else @endif>人力
                            <input type="radio" name="event" class="form-check-input" value="2" @if($article->event==2)checked="checked"@else @endif>物資
                            {{--</div>--}}<br>
                            {{--<div class="form-group">--}}
                            <label>類別：</label>
                            <input type="radio" name="demand" class="form-check-input" value="0" @if($article->demand==0)checked="checked"@else @endif>小
                            <input type="radio" name="demand" class="form-check-input" value="1" @if($article->demand==1)checked="checked"@else @endif>中
                            <input type="radio" name="demand" class="form-check-input" value="2" @if($article->demand==2)checked="checked"@else @endif>大
                            {{--</div>--}}<br>
                            {{--<div class="form-group">--}}
                            <label>內容：</label>
                            <textarea name="body" rows="10" class="form-control" required="required"
                                      placeholder="請輸入內容" >{{ $article->body }}</textarea>
                            {{--</div>--}}<br>
                            <input type="hidden" name="lat" class="form-control" required="required"
                                   value="{{ $article->lat }}">
                            <input type="hidden" name="lng" class="form-control" required="required"
                                   value="{{ $article->lng }}">
                            {{--<div class="form-group">--}}
                            <button type="submit" class="btn btn-lg btn-info">編輯完成</button>
                            {{--</div>--}}
                        </form>
                            <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
                            <script src="http://maps.google.com/maps?file=api&v=3&key=AIzaSyBpJwO8jbJW5ZbVBaz_UxYLf2aAUurFR0w"
                                    type="text/javascript"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    var geocoder = new google.maps.Geocoder();
                                    $("input[name=address]").blur(function(){
                                        address = $("input[name=address]").val();
                                        if(address){
                                            geocoder.geocode({'address': address}, function (results, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                    $("input[name=lat]").val(results[0].geometry.location.lat());
                                                    $("input[name=lng]").val(results[0].geometry.location.lng());
                                                }
                                                else {alert("地址格式錯誤");}
                                            })
                                        }

                                    });
                                });
                            </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        {{--{{$user}}--}}
        <table class="table">
            @foreach($user as $key => $data)
                <form action="{{url("/admin/member/update")}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$data['id']}}">
                    <tr class="<?=($data['level'] == '0') ? 'info' : 'danger'?>"> {{--bootstrap--}}
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            {{$data['name']}}
                        </td>
                        <td>
                            {{$data['email']}}
                        </td>
                        <td>
                                @if($data['level'] =='0')
                                    <input type="radio" name="level" value="0" checked> 會員 <input type="radio" name="level" value="1">管理員
                                @endif
                                @if($data['level'] =='1')
                                    <input type="radio" name="level" value="0"> 會員 <input type="radio" name="level" value="1" checked>管理員
                                @endif
                                {{--@if($data['level'] =='2')--}}
                                    {{--<input type="radio" name="level" value="3"> 弱勢團體 <input type="radio" name="level" value="2" checked> 企業 <input type="radio" name="level" value="0"> 會員 <input type="radio" name="level" value="1">管理員--}}
                                {{--@endif--}}
                                {{--@if($data['level'] =='2')--}}
                                    {{--<input type="radio" name="level" value="3" checked> 弱勢團體 <input type="radio" name="level" value="2" checked> 企業 <input type="radio" name="level" value="0"> 會員 <input type="radio" name="level" value="1">管理員--}}
                                {{--@endif--}}
                        </td>
                        <td>
                            <input type="submit" id="button" value="送出" class="btn"/>
                        </td>
                    </tr>
                </form>
            @endforeach
        </table>
    </div>
@endsection
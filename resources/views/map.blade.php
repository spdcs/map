@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="height: 800px; width: 1000px">
    {!! Mapper::render() !!}
    </div>
@endsection
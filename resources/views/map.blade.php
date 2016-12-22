@extends('layouts.app')

@section('content')
    <div id="map" class="container-fluid" style="height: 800px; width: 1000px">
        {!! Mapper::render() !!}
    </div>
    <div class="col-lg-8 col-sm-8 project">
        <div class="col-lg-3 col-sm-3 section">
            <div class="icon_image">
                <img src="resources/assets/img/box2.png">
            </div>
            <div class="textbox">
            <p class="text">物資</p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 section">
            <div class="icon_image">
                <img src="resources/assets/img/people.png">
            </div>
            <div class="textbox">
            <p class="text">人力</p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 section">
            <div class="icon_image">
                <img src="resources/assets/img/money.png">
            </div>
            <div class="textbox">
            <p class="text">金援</p>
            </div>
        </div>
    </div>
@endsection
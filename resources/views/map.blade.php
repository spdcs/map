@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="map" class="container-fluid" style="height: 800px; width: 1000px">
            {!! Mapper::render() !!}
        </div>
        <div class="col-lg-8 col-sm-8 project">
            <div class="section">
                <div class="icon_image">
                    <img src="resources/assets/img/box2.png">
                </div>
                <div class="textbox">
                    <h3>物資</h3>
                </div>
            </div>
            <div class="section">
                <div class="icon_image">
                    <img src="resources/assets/img/people.png">
                </div>
                <div class="textbox">
                    <h3>人力</h3>
                </div>
            </div>
            <div class="section">
                <div class="icon_image">
                    <img src="resources/assets/img/money.png">
                </div>
                <div class="textbox">
                    <h3>金援</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
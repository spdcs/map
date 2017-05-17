@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div class="container">
        <div id="map" class="container-fluid" style="height: 400px; width: 1000px">
            {{--{!! Mapper::render() !!}--}}
        </div>
        <script type="text/javascript">
            function initMap() {
                var URLs = '/map/apimap';
                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(23.795201261829853, 120.9694504737854);
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 8
                });
                $.ajax({
                    url: URLs,
                    type: 'GET',
                    dataType: 'json',
                    success: function (json) {
                        for (var i = 0; i < json.length; i++) {
                            var name = json[i].user_id;
                            var title = json[i].title;
                            var event = json[i].event;
                            var body = json[i].body;
                            var address = json[i].address;
                            var infocontent = "<div id='content'>" +
                                    '<div>會員姓名：' + name + '</div><div>標題：' + title + '</div><div>內容：' + body + '</div><div>地址：' + address + "</div>";
                            var lat = parseFloat(json[i].lat);
                            var lng = parseFloat(json[i].lng);
                            var myLatLng = {lat: lat, lng: lng};
                            var iconBase = 'resources/assets/img/';
                            var icons = {
                                0: {
                                    0: {icon: iconBase + 'money(0).png'},
                                    1: {icon: iconBase + 'money(1).png'},
                                    2: {icon: iconBase + 'money(2).png'}
                                },
                                1: {
                                    0: {icon: iconBase + 'people(0).png'},
                                    1: {icon: iconBase + 'people(1).png'},
                                    2: {icon: iconBase + 'people(2).png'}
                                },
                                2: {
                                    0: {icon: iconBase + 'box(0).png'},
                                    1: {icon: iconBase + 'box(1).png'},
                                    2: {icon: iconBase + 'box(2).png'}
                                }
                            };

                            var marker = new google.maps.Marker({
                                position: myLatLng,
                                icon: icons[json[i].event][json[i].demand].icon,
                                map: map
                            });

                            var infowindow = new google.maps.InfoWindow({
                                content: infocontent,
                                maxWidth: 300
                            });
                            google.maps.event.addListener(marker, 'click', (function (marker, infocontent, infowindow) {
                                return function () {
                                    infowindow.close();
                                    infowindow.setContent(infocontent);
                                    infowindow.open(map, marker);
                                };
                            })(marker, infocontent, infowindow));

                        }
                    }
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMnBndVCtznV9xYDSkYolR7Uxrln0-XCs&callback=initMap">
        </script>
        <div class="project">
            <div class="form-inline icon_image_text">
                <div class="icon_image">
                    <img src="resources/assets/img/box(3).png">
                </div>
                <div class="textbox">
                    <h3>物資</h3>
                </div>
            </div>
            <div class="form-inline icon_image_text">
                <div class="icon_image">
                    <img src="resources/assets/img/people(3).png">
                </div>
                <div class="textbox">
                    <h3>人力</h3>
                </div>
            </div>
            <div class="form-inline icon_image_text">
                <div class="icon_image">
                    <img src="resources/assets/img/money(3).png">
                </div>
                <div class="textbox">
                    <h3>金援</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
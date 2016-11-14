@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <center>
        <div id="map" style="width: 800px; height: 600px; border:double #dd1144"></div> <!--此為地圖顯示大小-->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8hRHdZEOVwpfzjh_Yo5Pu0Aw_RrsOsT8&callback=initMap">
        </script>
    </center>

    <script type="text/javascript">
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(23.795201261829853, 120.9694504737854);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 8
            });
        }
    </script>
@endsection
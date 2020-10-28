@extends('layouts.common_work')

@section('title', '天気情報')

@section('content')
<div style="min-height:600px;" class="container p-4">
    <div class="pt-2 pl-4">
        <h3>天気情報の出力</h3>
        <h3>地図やほかの都市を選べるように実装内容を変更→現在固定値</h3>
    </div>
    <form action="/weather/output" method="post">
    @csrf
    <select name='weather_select'>
        <option value="1853908">大阪</option>
        <option value="1850147">東京</option>
        <option value="1863967">福岡</option>
    </select>
    <input type="submit" value="検索">
    </form>
    @if(isset($apikey))
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{$apikey}}&callback=initMap">
        </script>
        <div id="map" style="width:620px; height:400px"></div>
        @if(!empty($lat))
        <script>        
            function initMap() {
                var opts = {
                    zoom: 15,
                    center: new google.maps.LatLng('{{$lat}}', '{{$lon}}')
                };
                var map = new google.maps.Map(document.getElementById("map"), opts);
            }
        </script>
        @endif
    @endif
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
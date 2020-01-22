@extends('layouts.temp')

@section('title', '会員詳細')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($member))
                <table>
                   <tr><th>surname: </th><td>{{$member->surname}}</td></tr>
                   <tr><th>givenname: </th><td>{{$member->givenname}}</td></tr>
                   <tr><th>dispname: </th><td>{{$member->dispname}}</td></tr>
                   <tr><th>mail: </th><td>{{$member->mail}}</td></tr>
                </table>
            @endif
        </div>
    </div>
    <div id="gear">
        <img src="{{ secure_asset('./img/gear.png') }}" alt="gear">
    </div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
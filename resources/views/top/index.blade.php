@extends('layouts.temp')

@section('title', 'トップ')

@section('content')
    <div id="mainPic">
        <a href="/logout">ログアウト</a>
    </div>
    <div id="gear">
        <img src="{{ secure_asset('./img/gear.png') }}" alt="gear">
    </div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
@extends('layouts.temp')

@section('title', '会員編集')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($member))
                ※パスワードは未登録なら更新しない。
                <table>
                <form action="/member/edit" method="post">
                   {{ csrf_field() }}
                   <input type="hidden" name="id" value="{{$member->id}}">
                   <tr><th>surname: </th><td><input type="text" name="surname" value="{{$member->surname}}"></td></tr>
                   <tr><th>givenname: </th><td><input type="text" name="givenname" value="{{$member->givenname}}"></td></tr>
                   <tr><th>dispname: </th><td><input type="text" name="dispname" value="{{$member->dispname}}"></td></tr>
                   <tr><th>mail: </th><td><input type="text" name="mail" value="{{$member->mail}}"></td></tr>
                   <tr><th>password: </th><td><input type="password" name="password" value=""></td></tr>
                   <tr><th></th><td><input type="submit" value="edit"></td></tr>
                </form>
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
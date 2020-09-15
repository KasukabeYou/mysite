@extends('layouts.temp')

@section('title', '会員編集')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($member) && !empty($member))
                <table>
                    <form action="/member/edit" method="post">
                       @csrf
                       <input type="hidden" name="id" value="{{$member->id}}">
                       <tr><th>name: </th><td><input type="text" name="name" value="{{$member->name}}"></td></tr>
                       <tr><th>email: </th><td><input type="text" name="email" value="{{$member->email}}"></td></tr>
                       <tr><th>password: </th><td><input type="text" name="password" value="{{$member->password}}"></td></tr>
                       <tr><th>confirme: </th><td><input type="password" name="password_confirmation" value="{{$member->password}}"></td></tr>
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
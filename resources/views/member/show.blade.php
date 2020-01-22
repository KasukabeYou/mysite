@extends('layouts.temp')

@section('title', 'トップ')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($members))
                <table>
                    <tr>
                        <td>surname</td>
                        <td>givenname</td>
                        <td>dispname</td>
                        <td>mail</td>
                    </tr>
                @foreach ($members as $member)
                    <tr>
                        <td>{{$member->surname}}</td>
                        <td>{{$member->givenname}}</td>
                        <td>{{$member->dispname}}</td>
                        <td>{{$member->mail}}</td>
                        <td><a href="{{ route('member.detail', $member->id) }}">詳細</a></td>
                        <td><a href="{{ route('member.edit', $member->id) }}">編集</a></td>
                        <td><a href="{{ route('member.del', $member->id) }}">削除</a></td>
                    </tr>
                @endforeach
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
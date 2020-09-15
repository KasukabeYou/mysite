@extends('layouts.common')

@section('title', 'トップ')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            @if(isset($members) && !empty($members))
                <table>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                    </tr>
                @foreach ($members as $member)
                    <tr>
                        <td>{{$member->name}}</td>
                        <td>{{$member->email}}</td>
                        <td><a href="{{ route('member.detail', $member->id) }}">詳細</a></td>
                        <td><a href="{{ route('member.edit', $member->id) }}">編集</a></td>
                        <td><a href="{{ route('member.del', $member->id) }}">削除</a></td>
                    </tr>
                @endforeach
                </table>
            @endif
        </div>
    </div>
    <a href="{{ route('works.index') }}">機能一覧へ戻る</a>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
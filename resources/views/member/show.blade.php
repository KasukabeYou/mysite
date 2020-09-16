@extends('layouts.common')

@section('title', 'トップ')

@section('content')
<div class="container">
    @if(isset($members) && !empty($members))
        <table class="table-sm m-4">
            <tr>
                <th class="col-xs-2 p-2">name</th>
                <th class="col-xs-2 p-2">email</th>
                <th class="col-xs-2 p-2"></th>
            </tr>
        @foreach ($members as $member)
            <tr>
                <td class="col-xs-2 p-2">{{$member->name}}</td>
                <td class="col-xs-2 p-2">{{$member->email}}</td>
                <td class="col-xs-2 p-2">
                    <a href="{{ route('member.detail', $member->id) }}">詳細</a>
                    <a href="{{ route('member.edit', $member->id) }}">編集</a>
                    <a href="{{ route('member.del', $member->id) }}">退会</a>
                </td>
            </tr>
        @endforeach
        </table>
    @endif
    <div class="pl-2 m-4">
        <a href="{{ route('works.index') }}">機能一覧へ戻る</a>
    </div>
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
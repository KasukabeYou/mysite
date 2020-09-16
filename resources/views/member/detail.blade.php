@extends('layouts.common')

@section('title', '会員詳細')

@section('content')
<div class="container">
    @if(isset($member) && !empty($member))
    <table class="table-sm m-4">
           <input type="hidden" name="id" value="{{$member->id}}">
           <tr><th class="col-xs-2 p-2">name: </th><td class="col-xs-2 p-2">{{$member->name}}</td></tr>
           <tr><th class="col-xs-2 p-2">email: </th><td class="col-xs-2 p-2">{{$member->email}}</td></tr>
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
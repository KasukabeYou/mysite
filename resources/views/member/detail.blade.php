@extends('layouts.common_work')

@section('title', '会員詳細')

@section('content')
    @if(isset($member) && !empty($member))
    <table class="table-sm m-4">
           <input type="hidden" name="id" value="{{$member->id}}">
           <tr><th class="col-xs-2 p-2">@lang('messages.member.name'): </th><td class="col-xs-2 p-2">{{$member->name}}</td></tr>
           <tr><th class="col-xs-2 p-2">@lang('messages.member.email'): </th><td class="col-xs-2 p-2">{{$member->email}}</td></tr>
           <tr><td class="col-xs-2 p-2 text-center" colspan="2"><input type="button" onclick="location.href='{{route('works.index')}}'" value="{{__('messages.work.return')}}"></td></tr>
    </table>
    @endif
    <!--<div class="pl-2 m-4">-->
    <!--    <a href="{{ route('works.index') }}">@lang('messages.member.return')</a>-->
    <!--</div>-->
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
@extends('layouts.common_work')

@section('title', '会員退会')

@section('content')
    @if(isset($member))
    <form action="/member/del" method="post">
       @csrf
        <input type="hidden" name="id" value="{{$member->id}}">
        <table class="table-sm m-4">
            <tr><th class="col-xs-2 p-2">@lang('messages.member.name'): </th><td class="col-xs-2 p-2">{{$member->name}}</td></tr>
            <tr><th class="col-xs-2 p-2">@lang('messages.member.email'): </th><td class="col-xs-2 p-2">{{$member->email}}</td></tr>
            <tr><td class="col-xs-2 p-2 text-center"><input type="submit" value="{{__('messages.member.delete')}}"></td><td class="col-xs-2 p-2"><input type="button" onclick="location.href='{{route('works.index')}}'" value="{{__('messages.work.return')}}"></td></tr>
        </table>
    </form>
    @endif
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
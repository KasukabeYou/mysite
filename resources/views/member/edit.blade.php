@extends('layouts.common_work')

@section('title', '会員編集')

@section('content')
    @if(isset($member) && !empty($member))
    <form action="/member/edit" method="post">
       @csrf
        <table class="table-sm m-4">
               <input type="hidden" name="id" value="{{$member->id}}">
               <tr><th class="col-xs-2 p-2">@lang('messages.member.name'): </th><td class="col-xs-2 p-2"><input type="text" name="name" value="{{$member->name}}"></td></tr>
               <tr><th class="col-xs-2 p-2">@lang('messages.member.email'): </th><td class="col-xs-2 p-2"><input type="text" name="email" value="{{$member->email}}"></td></tr>
               <input type="hidden" name="password" value="{{$member->password}}">
               <input type="hidden" name="password_confirmation" value="{{$member->password}}">
               <tr><td class="col-xs-2 p-2 text-center"><input type="submit" value="{{__('messages.member.edit')}}"></td><td class="col-xs-2 p-2"><input type="button" onclick="location.href='{{route('works.index')}}'" value="{{__('messages.work.return')}}"></td></tr>
        </table>
    </form>
    @endif
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
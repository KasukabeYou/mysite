@extends('layouts.common_work')

@section('title', '会員登録')

@section('menubar')
    @parent
    会員登録ページ
@endsection

@section('content')
    <form action="/member/add" method="post">
    @csrf
        <table class="table-sm m-4">
            <tr><th class="col-xs-2 p-2">@lang('messages.member.name'): </th><td class="col-xs-2 p-2"><input type="text" name="name"></td></tr>
            <tr><th class="col-xs-2 p-2">@lang('messages.member.email'): </th><td class="col-xs-2 p-2"><input type="text" name="email"></td></tr>
            <tr><th class="col-xs-2 p-2">@lang('messages.member.password'): </th><td class="col-xs-2 p-2"><input type="password" name="password"></td></tr>
            <tr><th class="col-xs-2 p-2">@lang('messages.member.confirme'): </th><td class="col-xs-2 p-2"><input type="password" name="password_confirmation"></td></tr>
            <tr><td class="col-xs-2 p-2 text-center"><input type="submit" value="{{__('messages.member.regist')}}"></td><td class="col-xs-2 p-2"><input type="button" onclick="location.href='{{route('works.index')}}'" value="{{__('messages.work.return')}}"></td></tr>
        </table>
    </form>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection

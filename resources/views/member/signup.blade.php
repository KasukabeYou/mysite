@extends('layouts.common')

@section('title', '会員登録')

@section('menubar')
    @parent
    会員登録ページ
@endsection

@section('content')
<div class="container">
    <form action="/member/add" method="post">
    @csrf
        <table class="table-sm m-4">
            <tr><th class="col-xs-2 p-2">name: </th><td class="col-xs-2 p-2"><input type="text" name="name"></td></tr>
            <tr><th class="col-xs-2 p-2">email: </th><td class="col-xs-2 p-2"><input type="text" name="email"></td></tr>
            <tr><th class="col-xs-2 p-2">password: </th><td class="col-xs-2 p-2"><input type="password" name="password"></td></tr>
            <tr><th class="col-xs-2 p-2">confirme: </th><td class="col-xs-2 p-2"><input type="password" name="password_confirmation"></td></tr>
            <tr><td class="col-xs-2 p-2 text-center" colspan="2"><input type="submit" value="regist"></td></tr>
        </table>
    </form>
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection

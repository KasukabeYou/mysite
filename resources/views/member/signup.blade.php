@extends('layouts.common')

@section('title', '会員登録')

@section('menubar')
    @parent
    会員登録ページ
@endsection

@section('content')
    <div id="mainPic">
        <div class="t_info">
            <table>
                <form action="/member/add" method="post">
                   @csrf
                   <tr><th>name: </th><td><input type="text" name="name"></td></tr>
                   <tr><th>email: </th><td><input type="text" name="email"></td></tr>
                   <tr><th>password: </th><td><input type="password" name="password"></td></tr>
                   <tr><th>confirme: </th><td><input type="password" name="password_confirmation"></td></tr>
                   <tr><th></th><td><input type="submit" value="create"></td></tr>
                </form>
            </table>
        </div>
    </div>
@endsection

@section('footer')
copyright 2019 kou.
@endsection

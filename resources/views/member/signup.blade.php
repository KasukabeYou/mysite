@extends('layouts.temp')

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
                   {{ csrf_field() }}
                   <tr><th>surname: </th><td><input type="text" name="surname"></td></tr>
                   <tr><th>givenname: </th><td><input type="text" name="givenname"></td></tr>
                   <tr><th>dispname: </th><td><input type="text" name="dispname"></td></tr>
                   <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
                   <tr><th>password: </th><td><input type="password" name="password"></td></tr>
                   <tr><th></th><td><input type="submit" value="create"></td></tr>
                </form>
            </table>
        </div>
    </div>
@endsection

@section('footer')
copyright 2019 kou.
@endsection

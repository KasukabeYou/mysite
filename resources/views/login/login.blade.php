@extends('layouts.temp')

@section('title', 'ログイン')

@section('menubar')
    @parent
    ログイン画面
@endsection

@section('content')
    <div id="mainPic">
        <div class="t_info">
            <table>
                <form action="/login" method="post">
                   {{ csrf_field() }}
                   <tr><th>ID: </th><td><input type="text" name="mail"></td></tr>
                   <tr><th>Password: </th><td><input type="password" name="password"></td></tr>
                   <tr><th></th><td><input type="submit" value="login"></td></tr>
                </form>
            </table>
        </div>
    </div>
@endsection

@section('footer')
copyright 2019 kou.
@endsection

@extends('layouts.bs_temp')

@section('title', 'ログイン')

@section('menubar')
    @parent
    ログイン画面
@endsection

@section('content')
    <div id="mainPic">
        <div class="t_info">
            <div class="sign">ログイン</div><br />
            <table>
                <form action="/login" method="post">
                   {{ csrf_field() }}
                   <tr><th><div class="label">メール: </div></th><td><input class="un " type="text" name="mail" align="center" placeholder="MAIL"></td></tr>
                   <tr><th><div class="label">パスワード: </div></th><td><input class="pass" type="password" name="password" align="center" placeholder="Password"></td></tr>
                   <tr><th></th><td><input type="submit" class="submit" value="login"></td></tr>
                </form>
            </table>
            
        </div>
    </div>
@endsection

@section('footer')
copyright 2019 kou.
@endsection

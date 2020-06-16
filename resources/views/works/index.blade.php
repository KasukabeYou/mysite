@extends('layouts.work_temp')

@section('title', '作品')

@section('content')
    <div id="mainPic">
        <div class="t_info">
            <table>
                <tr>
                    <td>機能名</td>
                    <td>リンク</td>
                </tr>            
                <tr>
                    <td>メンバー管理処理</td>
                    <td><a href="{{ action('Member\MemberController@signup') }}">登録</a> <a href="{{ action('Member\MemberController@show') }}">参照</a></td>
                </tr>
                <tr>
                    <td>LineMessageApi</td>
                    <td><a href="{{ action('TopController@index') }}">TOP</a></td>
                </tr>
                <tr>
                    <td>ログイン（AZURE AD使用）</td>
                    <td><a href="{{ action('TopController@index') }}">TOP</a></td>
                </tr>
                <tr>
                    <td>XXXXX</td>
                    <td><a href="{{ action('TopController@index') }}">TOP</a></td>
                </tr>
            </table>
        </div>
    </div>
    <!--
    <div id="gear">
        <img src="{{ secure_asset('./img/gear.png') }}" alt="gear">
    </div>
    -->
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
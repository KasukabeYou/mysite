@extends('layouts.bs_temp')

@section('title', 'Technical Diary')

@section('content')
    <div class="mainPic">
        <div id="mainBg">
            <div id="titleWord">
                Let's <br />
                Walk<br />
                In Front<br />
            </div>
            <img src="../img/top_b.jpg" class="mainImg" alt="" />
        </div>
    </div>

    <div id="mainPf">
        <div id="mainPfBg">
            <div id="titleLogo">Profile</div>
            <table>
                <tr>
                    <th>名前</th>
                    <td>春日部コウ</td>
                </tr>
                <tr>
                    <th rowspan="2">経歴</th>
                    <td>IT業界で10年以上、携わっており開発・設計をメインでWEB・業務エンジニアとして活動中。</td>
                </tr>
                <tr>
                    <td>勉強会なども実施しており、インストラクターとしてプログラミングの指導も行っている。</td>
                </tr>
                <tr>
                    <th>対応言語</th>
                    <td>HTML / CSS / JS / JAVA / PHP / Ruby / React </td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td>（勉強会）<a href="https://mokumoku0mattari.connpass.com/event/165427/?utm_campaign=event_participate_to_owner&utm_source=notifications&utm_medium=email&utm_content=title_link">もくもくまったり勉強会</a></a></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="mainWk">
        <div id="mainWkBg">
            <div id="titleLogo">Works</div>
            <table>
                <tr>
                    <td>作成機能一覧</td>
                    <td>勉強や実験も兼ねて色々とアウトプットしようと思い、作成したシステムを載せています。</td>
                </tr>
                <tr colspan="2">
                    <td><a id="contact_us" href="{{ action('Works\WorksController@index') }}">機能一覧はこちら</a></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div id="mainMl">
        <div id="mainMlBg">
            <div id="titleLogo">Contact Us</div>
            <table>
                <tr>
                    <th>お問い合わせ</th>
                </tr>
                <tr>
                    <td>何か御用のある方は下のボタンより、問い合わせ画面にて連絡してください。</td>
                </tr>
                <tr>
                    <td><a id="contact_us" href="{{ action('Mail\MailController@index') }}">お問い合わせはこちら</a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
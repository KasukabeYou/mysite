<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ secure_asset('/css/index.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>
        
        <div class="boxA">
            <div class="boxA-inner">
                <div class="box1">
                    <div class="site">
                        <h1 class="header-logo-design"><a href="#">Travel Diary</a></h1>
                    </div>
                </div>
                <div class="box2">
                    <nav class="menu" id="menu">
                        <ul>
                            <li><a href="{{ action('TopController@index') }}">TOP</a></li>
                            <li><a href="{{ action('Profile\ProfileController@index') }}">PROFILE</a></li>
                            <li><a href="{{ action('Works\WorksController@index') }}">WORKS</a></li>
                            <li><a href="{{ action('Mail\MailController@index') }}">MAIL</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="contents">
            <div id="mainContents">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            <div id="f-inner">
                @yield('footer')
            </div>
        </div>
    </body>
</html>
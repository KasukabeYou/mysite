<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ secure_asset('css/bs_index.css') }}">
        <script src="{{ secure_asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ secure_asset('js/index.js') }}"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <header class="boxA">
            <div class="boxA-inner">
                <div class="box1">
                    <div class="site">
                        <h1 class="header-logo-design"><a href="{{ action('TopController@index') }}">Technical Diary</a></h1>
                    </div>
                </div>
                <div class="box2">
                    <nav class="menu" id="menu">
                        <ul>
                            <li><a href="#mainContents">TOP</a></li>
                            <li><a href="#mainPf">PROFILE</a></li>
                            <li><a href="#mainWk">WORKS</a></li>
                            <li><a href="#mainMl">CONTACT US</a></li>
                            <li><a href="{{ action('Login\LoginController@logout') }}">LOGOUT</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
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
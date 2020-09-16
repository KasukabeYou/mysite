<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ secure_asset('css/bs_index.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
        <script src="{{ secure_asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ secure_asset('js/index.js') }}"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
          <div class="container text-center">
            <a class="text-white" href="{{ action('TopController@index') }}">Technical Diary</a>
          </div>
        </nav>
        <div class="contents">
            <div id="mainContents">
                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <footer class="py-4 bg-dark text-light">
          <div class="container text-center">
            @yield('footer')
          </div>
        </footer>
    </body>
</html>
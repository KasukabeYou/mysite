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
          <div class="container">
            <!-- サブコンポーネント -->
            <!-- ブランド -->
            <!--<h1 class="header-logo-design"><a href="{{ route('top') }}">Technical Diary</a></h1>-->-->
            <a class="navbar-brand" href="{{ route('top') }}">Technical Diary</a>
            <!-- 切替ボタン 画面サイズが小さくなった場合-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーション -->
            <div class="collapse navbar-collapse" id="navbar-content">
              <!-- ナビゲーションメニュー -->
              <!-- 左側メニュー：トップページの各コンテンツへのリンク -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#topSt">Top <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#profileSt">PROFILE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#worksSt">WORKS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactUsSt">CONTACT US</a>
                </li>
                <li class="nav-item">
                  <!-- ログイン・ログアウト実装予定 -->
                </li>
                <!-- ドロップダウン -->
                <!--<li class="nav-item dropdown">-->
                <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Information </a>-->
                <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                <!--    <a class="dropdown-item" href="#shop">Shop</a>-->
                <!--    <a class="dropdown-item" href="#access">Access</a>-->
                <!--  </div>-->
                <!--</li>-->
              </ul>
              <!-- 右側メニュー：Contactページへのリンク -->
              <!--<ul class="navbar-nav">-->
              <!--  <li class="nav-item">-->
              <!--    <a href="contact.html" class="nav-link btn btn-info">Contact</a>-->
              <!--  </li>-->
              <!--</ul>-->
              <!-- /ナビゲーションメニュー -->
            </div>
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
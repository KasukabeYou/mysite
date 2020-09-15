@extends('layouts.common')

@section('title', 'Technical Diary -Works-')

@section('content')
  <!--</div>-->
  <!-- Profile -->
  <div id="profileSt"></div>
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <h3 class="text-center mb-3">機能一覧</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
            <tbody>
                <tr>
                    <th>機能名</th>
                    <th>リンク</th>
                </tr>            
                <tr>
                    <td>メンバー管理処理</td>
                    <td><a href="{{ route('member.signup') }}">登録</a>　<a href="{{ route('member.show') }}">一覧参照</a></td>
                </tr>
                <tr>
                    <td>ログイン処理</td>
                    <td><a href="{{ route('login') }}">ログイン</a></td>
                </tr>
                <tr>
                    <td>LineMessageApi</td>
                    <td><a href="{{ action('TopController@index') }}">作成中</a></td>
                </tr>
                <!--<tr>-->
                <!--    <td>ログイン（AZURE AD使用）</td>-->
                <!--    <td><a href="{{ action('TopController@index') }}">作成中</a></td>-->
                <!--</tr>-->
                <tr>
                    <td>XXXXX</td>
                    <td><a href="{{ action('TopController@index') }}">作成中</a></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('footer')
    <!-- ナビゲーション -->
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="#topSt">Top</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#profileSt">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#worksSt">Works</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contactUsSt">Contact Us</a>
      </li>
    </ul>
    <!-- ナビゲーション -->
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
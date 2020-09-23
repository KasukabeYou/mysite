@extends('layouts.common')

@section('title', 'Technical Diary')

@section('content')
  <!-- Top -->
  <!--<div id="topSet">-->
  <div class="flex card bg-dark text-white">
    <img class="card-img top-img" src="../img/top_b.jpg" alt="トップ画像">
    <div class="d-flex align-items-center  justify-content-center card-img-overlay">
      <h1>@lang('messages.welcome')</h1>
    </div>
  </div>
  <!--</div>-->
  <!-- Profile -->
  <div id="profileSt"></div>
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.profile')</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
            <tbody>
              <tr>
                  <th>名前</th>
                  <td>大久保　賢一</td>
              </tr>
              <tr>
                  <th>経歴</th>
                  <td>IT業界で10年以上、携わっており開発・設計をメインでWEB・業務エンジニアとして活動中。<br/>勉強会なども実施しており、インストラクターとしてプログラミングの指導も行っております。</td>
              </tr>
              <tr>
                  <th>対応言語</th>
                  <td>HTML / CSS / JS / JAVA / PHP / Ruby / Python </td>
              </tr>
              <tr>
                  <th>URL</th>
                  <td>（勉強会 ※ただいま休止中）<a href="https://mokumoku0mattari.connpass.com/event/165427/?utm_campaign=event_participate_to_owner&utm_source=notifications&utm_medium=email&utm_content=title_link">もくもくまったり勉強会</a></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <!-- Works -->
  <div id="worksSt"></div>
  <div class="py-5 bgSkySet worksSt">
    <section id="works">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.work.work')</h3>
        <div class="card text-left text-dark w-75 mx-auto">
          <div class="pl-2 pt-2 ">
            <h5><strong>作成機能一覧</strong></h5>
            <div>勉強や実験も兼ねて色々とアウトプットしようと思い、作成したシステムを載せています。</div>
            <div class="p-3 text-center">
              <a id="contact_us" href="{{ action('Works\WorksController@index') }}">機能一覧はこちら</a>
            <div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Contact Us -->
  <div id="contactUsSt"></div>
  <div class="py-5 bg-light">
    <section id="contactUs">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.contact')</h3>
        <div class="card text-left text-dark w-75 mx-auto">
          <div class="pl-2 pt-2 ">
            <div>何か御用のある方は下のボタンより、問い合わせ画面にて連絡してください。</div>
            <div class="p-3 text-center">
              <a id="contact_us" href="{{ action('Mail\MailController@index') }}">お問い合わせはこちら</a>
            <div>
          </div>
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
        <a class="nav-link" href="#profileSt">@lang('messages.profile')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#worksSt">@lang('messages.work.work')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contactUsSt">@lang('messages.contact')</a>
      </li>
    </ul>
    <!-- ナビゲーション -->
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
@extends('layouts.common')

@section('title', 'Technical Diary')

@section('content')
  <!-- Top -->
  <!--<div id="topSet">-->
  <div id="topSt"></div>
  <div class="py-5 bgSkySet topSt">
    <section id="top">
      <div class="container">
        <div class="row p-3 bg-light">
          <div class="col-md-5">
            <h1>Let's <br />
            Walk<br />
            In Front<br />
            </h1>
          </div>
          <div class="col-md-7">
            <img src="../img/top_b.jpg" alt="TOP" class="img-fluid">
          </div>
        </div>  
      </div>
    </section>
  </div>
  <!--</div>-->
  <!-- Profile -->
  <div id="profileSt"></div>
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <h3 class="text-center mb-3">Profile</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
            <tbody>
              <tr>
                  <th>名前</th>
                  <td>春日部コウ</td>
              </tr>
              <tr>
                  <th>経歴</th>
                  <td>IT業界で10年以上、携わっており開発・設計をメインでWEB・業務エンジニアとして活動中。<br/>勉強会なども実施しており、インストラクターとしてプログラミングの指導も行っている。</td>
              </tr>
              <tr>
                  <th>対応言語</th>
                  <td>HTML / CSS / JS / JAVA / PHP / Ruby / React </td>
              </tr>
              <tr>
                  <th>URL</th>
                  <td>（勉強会）<a href="https://mokumoku0mattari.connpass.com/event/165427/?utm_campaign=event_participate_to_owner&utm_source=notifications&utm_medium=email&utm_content=title_link">もくもくまったり勉強会</a></a></td>
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
        <h3 class="text-center mb-3">Works</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
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
    </section>
  </div>
  <!-- Contact Us -->
  <div id="contactUsSt"></div>
  <div class="py-5 bg-light">
    <section id="contactUs">
      <div class="container">
        <h3 class="text-center mb-3">Contact Us</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
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
@extends('layouts.common_work')

@section('title', 'Technical Diary -Works-')

@section('content')
  <!--</div>-->
  <!-- Profile -->
  <div id="profileSt"></div>
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.work.list')</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <table class="table table-striped text-left">
            <tbody>
                <tr>
                    <th>機能名</th>
                    <th>リンク</th>
                </tr>            
                <tr>
                    <td>メンバー管理処理</td>
                    <td>
                    @guest
                      <a href="{{ route('member.signup') }}">@lang('messages.member.regist')</a>
                    @else
                      <a href="{{ route('member.show') }}">一覧参照</a>
                    @endguest
                    </td>
                </tr>
                <tr>
                    <td>ログイン/ログアウト処理</td>
                    @guest
                      <td><a href="{{ route('login') }}">@lang('messages.login')</a></td>
                    @else
                      <td>
                        @lang('messages.username')：{{ Auth::user()->name }}<br/>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('messages.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </td>
                    @endguest
                </tr>
                <tr>
                    <td>LineMessageApi</td>
                    <td><a href="{{ route('top') }}">作成中</a></td>
                </tr>
                <!--<tr>-->
                <!--    <td>ログイン（AZURE AD使用）</td>-->
                <!--    <td><a href="{{ route('top') }}">作成中</a></td>-->
                <!--</tr>-->
                <tr>
                    <td>XXXXX</td>
                    <td><a href="{{ route('top') }}">作成中</a></td>
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
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
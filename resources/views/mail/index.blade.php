@extends('layouts.common_work')

@section('title', 'メールフォーム')

@section('content')
<div class="container p-4">
    <div class="card text-left text-dark w-75 mx-auto">
        <form method="POST" action="{{ route('mail.confirm') }}">
        @csrf
          <table class="table table-striped text-left">
            <tbody>
              <tr>
                  <td colspan="3">お問い合わせ内容を入力してください。</td>
              </tr>
              <tr>
                  <td style="width:20%" rowspan="3">お問い合わせ</td>
                  <td style="width:30%">メールアドレス</td>
                  <td style="width:50%">
                    <input style="width:80%" name="email" value="{{ old('email') }}" type="text">
                    @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                  </td>
              </tr>
              <tr>
                  <td style="width:30%">タイトル</td>
                  <td style="width:50%">
                    <input style="width:80%" name="title" value="{{ old('title') }}" type="text">
                    @if ($errors->has('title'))
                        <p class="error-message">{{ $errors->first('title') }}</p>
                    @endif
                  </td>
              </tr>
              <tr>
                  <td style="width:30%">お問い合わせ内容</td>
                  <td style="width:50%">
                    <textarea style="width:100%;min-height:200px;" name="body">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                  </td>
              </tr>
              <tr>
                  <td colspan="3">
                    <div class="p-3 text-center">
                      <button id="contact_us" type="submit">お問い合わせ内容確認</button>
                    <div>
                  </td>
              </tr>
            </tbody>
          </table>
        </form>
    </div>
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection
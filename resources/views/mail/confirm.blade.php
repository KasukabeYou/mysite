@extends('layouts.common_work')

@section('title', 'メール送信確認')

@section('content')
<div class="container p-4">
    <div class="card text-left text-dark w-75 mx-auto">
        <form method="POST" action="{{ route('mail.send') }}">
            @csrf
            <input name="email" value="{{ $inputs['email'] }}" type="hidden">
            <input name="title" value="{{ $inputs['title'] }}" type="hidden">
            <input name="body" value="{{ $inputs['body'] }}" type="hidden">
            <table class="table table-striped text-left">
                <tbody>
                  <tr>
                      <td colspan="3">お問い合わせ内容は、以下となります。<br/>内容に問題なければ送信ボタンを押してください。</td>
                  </tr>
                  <tr>
                      <td style="width:20%" rowspan="3">お問い合わせ</td>
                      <td style="width:30%">メールアドレス</td>
                      <td style="width:50%">{{ $inputs['email'] }}</td>
                  </tr>
                  <tr>
                      <td style="width:30%">タイトル</td>
                      <td style="width:50%">{{ $inputs['title'] }}</td>
                  </tr>
                  <tr>
                      <td style="width:30%">お問い合わせ内容</td>
                      <td style="width:50%">{!! nl2br(e($inputs['body'])) !!}</td>
                  </tr>
                  <tr>
                      <td colspan="3">
                        <div class="p-3 text-center">
                            <button type="submit" name="action" value="back">入力内容修正</button>
                            <button type="submit" name="action" value="submit">送信する</button>
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
    <p>Copyright © Travel Diary</p>
@endsection
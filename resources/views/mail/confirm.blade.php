@extends('layouts.common_work')

@section('title', 'メール送信確認')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('mail.send') }}">
    @csrf
    <input name="email" value="{{ $inputs['email'] }}" type="hidden">
    <input name="title" value="{{ $inputs['title'] }}" type="hidden">
    <input name="body" value="{{ $inputs['body'] }}" type="hidden">
    <table class="table-sm m-4">
        <tr><th class="col-xs-2 p-2">メールアドレス</th><td class="col-xs-2 p-2">{{ $inputs['email'] }}</td></tr>
        <tr><th class="col-xs-2 p-2">タイトル</th><td class="col-xs-2 p-2">{{ $inputs['title'] }}</td></tr>
        <tr><th class="col-xs-2 p-2">お問い合わせ内容</th><td class="col-xs-2 p-2">{!! nl2br(e($inputs['body'])) !!}</td></tr>
        <tr><td class="col-xs-2 p-2 text-center" colspan="2">
            <button type="submit" name="action" value="back">入力内容修正</button>
            <button type="submit" name="action" value="submit">送信する</button>
        </td></tr>
    </table>
    </form>
</div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
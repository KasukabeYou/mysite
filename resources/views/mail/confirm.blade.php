@extends('layouts.common')

@section('title', 'メール送信確認')

@section('content')
    <div id="mainPic">
        <div id="mainBg">
            <form method="POST" action="{{ route('mail.send') }}">
                @csrf
            
                <label>メールアドレス</label>
                {{ $inputs['email'] }}
                <input
                    name="email"
                    value="{{ $inputs['email'] }}"
                    type="hidden">
            
                <label>タイトル</label>
                {{ $inputs['title'] }}
                <input
                    name="title"
                    value="{{ $inputs['title'] }}"
                    type="hidden">
            
                <label>お問い合わせ内容</label>
                {!! nl2br(e($inputs['body'])) !!}
                <input
                    name="body"
                    value="{{ $inputs['body'] }}"
                    type="hidden">
    
                <button type="submit" name="action" value="back">
                    入力内容修正
                </button>
                <button type="submit" name="action" value="submit">
                    送信する
                </button>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
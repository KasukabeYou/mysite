@extends('layouts.common_work')

@section('title', 'メール送信完了')

@section('content')
<div class="container">
    <div class="pt-2 pl-4">
        <h3>送信完了しました。</h3>
    </div>
    <div class="pl-2 m-4">
        <a href="{{ route('works.index') }}">機能一覧へ戻る</a>
    </div>
</div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
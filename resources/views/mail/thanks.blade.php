@extends('layouts.common_work')

@section('title', 'お問い合わせ内容送信完了')

@section('content')
<div style="min-height:600px;" class="container p-4">
    <div class="pt-2 pl-4">
        <h3>お問い合わせ内容を送信いたしました。</h3>
        <h3>内容を確認次第に、担当者からご連絡いたしますので少々お待ちください。</h3>
    </div>
    <div class="pl-2 m-4">
        <a href="{{ route('top') }}">トップへ戻る</a>
    </div>
</div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
@extends('layouts.common')

@section('title', 'メールフォーム')

@section('content')
    <div id="mainPic">
        <div id="mainBg">
            <form method="POST" action="{{ route('mail.confirm') }}">
                @csrf
                <table>
                    <tr>
                        <th>
                            メールアドレス
                        </th>
                        <td>
                            <input
                                name="email"
                                value="{{ old('email') }}"
                                type="text">
                            @if ($errors->has('email'))
                                <p class="error-message">{{ $errors->first('email') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            タイトル
                        </th>
                        <td>
                            <input
                                name="title"
                                value="{{ old('title') }}"
                                type="text">
                            @if ($errors->has('title'))
                                <p class="error-message">{{ $errors->first('title') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            お問い合わせ内容
                        </th>
                        <td>
                            <textarea name="body">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <p class="error-message">{{ $errors->first('body') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">入力内容確認</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <p>Copyright © Travel Diary</p>
@endsection
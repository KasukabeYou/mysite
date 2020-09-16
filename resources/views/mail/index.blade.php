@extends('layouts.common_work')

@section('title', 'メールフォーム')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('mail.confirm') }}">
    @csrf
    <table class="table-sm m-4">
        <tr>
            <th class="col-xs-2 p-2">
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
            <th class="col-xs-2 p-2">
                タイトル
            </th>
            <td class="col-xs-2 p-2">
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
            <th class="col-xs-2 p-2">
                お問い合わせ内容
            </th>
            <td class="col-xs-2 p-2">
                <textarea name="body">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </td>
        </tr>
        <tr>
            <td class="col-xs-2 p-2 text-center" colspan="2">
                <button type="submit">入力内容確認</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection